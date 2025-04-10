<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use PDF;
use App\ProductSale;
use App\Sale;
use App\Adjust;
use App\Product;
use Carbon\Carbon;
use App\GeneralOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductStockCollections;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:stock.report')->only('stockreport','stockreportshow','stockreportpdf');
        $this->middleware('permission:stock.display')->only('index');
        $this->middleware('permission:stock.edit')->only('hideFromStock', 'restoreFromStock', 'updateAdjust', 'StoreStockAdjustment');
    }


    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    function _generateStock($products)
    {
        $stockinfo = [];
        foreach ($products as $product) {
            $adjust = DB::table('adjusts')->where('product_id', '=', $product->id)->sum('qty');
            $sale = DB::table('product_sale')->where('product_id', '=', $product->id)->sum('qty');
            $free = DB::table('product_sale')->where('product_id', '=', $product->id)->sum('free');
            $purchase = DB::table('product_purchase')->where('product_id', '=', $product->id)->sum('qty');
            $return = DB::table('product_returnproduct')->where('product_id', '=', $product->id)->sum('qty');
            $stock = (($return + $purchase) - ($sale + $free)) + $adjust;
            array_push($stockinfo, ['product_id' => $product->id, 'sale' => $sale, 'free' => $free, 'purchase' => $purchase, 'return' => $return, 'stock' => $stock]);
        }

        return $stockinfo;
    }

    public function _getStockQtyByProductID($product_id)
    {
        $adjust = DB::table('adjusts')->where('product_id', '=', $product_id)->sum('qty');
        $sale = DB::table('product_sale')->where('product_id', '=', $product_id)->sum('qty');
        $free = DB::table('product_sale')->where('product_id', '=', $product_id)->sum('free');
        $purchase = DB::table('product_purchase')->where('product_id', '=', $product_id)->sum('qty');
        $return = DB::table('product_returnproduct')->where('product_id', '=', $product_id)->sum('qty');
        $stock = (($return + $purchase) - ($sale + $free)) + $adjust;
        return $stock;
    }

    public function date_sort_asc($a, $b)
    {
        return strtotime($a->date) - strtotime($b->date);
    }

    public function date_sort_desc($a, $b)
    {
        return strtotime($b->date) - strtotime($a->date);
    }

    public function getProductStockHistory(Request $request, $product_id)
    {

        $adjusts = DB::table('adjusts')
            ->where('product_id', '=', $product_id)
            ->select('adjusts.id', 'adjusts.notes', 'adjusts.adjusted_at as date', 'adjusts.qty')
            ->addSelect(DB::raw("'Stock Adjustments' as type"))
            ->addSelect(DB::raw("false as editable"))
            ->get();

        $sales = DB::table('product_sale')
            ->where('product_sale.product_id', '=', $product_id)
            ->join('users', 'product_sale.user_id', '=', 'users.id')
            ->select('product_sale.id', 'product_sale.sales_at as date', 'product_sale.qty', 'users.name')
            ->addSelect(DB::raw("'Product Sales' as type"))
            ->addSelect(DB::raw("false as editable"))
            ->addSelect(DB::raw("'' as notes"))
            ->get();

        $frees = DB::table('product_sale')
            ->where('product_sale.product_id', '=', $product_id)
            ->where('product_sale.free', '>', 0)
            ->join('users', 'product_sale.user_id', '=', 'users.id')
            ->select('product_sale.id', 'product_sale.sales_at as date', 'product_sale.free as qty', 'users.name')
            ->addSelect(DB::raw("'Product Free Count' as type"))
            ->addSelect(DB::raw("false as editable"))
            ->addSelect(DB::raw("'' as notes"))
            ->get();

        $purchases = DB::table('product_purchase')
            ->where('product_purchase.product_id', '=', $product_id)
            ->join('suppliers', 'product_purchase.supplier_id', '=', 'suppliers.id')
            ->select('product_purchase.id', 'product_purchase.purchased_at as date', 'product_purchase.qty', 'suppliers.name')
            ->addSelect(DB::raw("'Product Purchases' as type"))
            ->addSelect(DB::raw("false as editable"))
            ->addSelect(DB::raw("'' as notes"))
            ->get();


        $returns = DB::table('product_returnproduct')
            ->where('product_returnproduct.product_id', '=', $product_id)
            ->join('users', 'product_returnproduct.user_id', '=', 'users.id')
            ->select('product_returnproduct.id', 'product_returnproduct.returned_at as date', 'product_returnproduct.qty', 'users.name')
            ->addSelect(DB::raw("'Product Returns' as type"))
            ->addSelect(DB::raw("false as editable"))
            ->addSelect(DB::raw("'' as notes"))
            ->get();


        $mergeData = $sales->merge($adjusts)
            ->merge($frees)
            ->merge($purchases)
            ->merge($returns);

        $mergeData = $mergeData->toArray();

        usort($mergeData, array($this, "date_sort_desc"));
        return $this->paginate($mergeData, $request->per_page ?? 5);
    }

    public function index()
    {
        $hidden_count = Product::where('discontinued', true)->count();
        $products = Product::where('discontinued', false)
            ->orderBy('product_name', 'ASC')
            ->paginate(10);
        $stock_info = $this->_generateStock($products);
        return view('admin.stock.index', compact('products', 'stock_info', 'hidden_count'));
    }

    public function getProductWithStock()
    {
        $hidden_count = Product::where('discontinued', true)->count();
        $productCollections = Product::where('discontinued', false)
            ->orderBy('product_name', 'ASC')->paginate(10);
        $stockinfo = $this->_generateStock($productCollections);
        return ['product_collections' => $productCollections, 'stock_info' => $stockinfo, 'hidden_count' => $hidden_count];
    }

    public function searchProductWithStock($query_field, $query, Request $request)
    {
        $hidden_count = Product::where('discontinued', true)->count();
        $productCollections = Product::where('discontinued', false)
            ->where($query_field, 'LIKE', "%$query%")->orderBy('product_name', 'ASC')->paginate(10);
        $stockinfo = $this->_generateStock($productCollections);
        return ['product_collections' => $productCollections, 'stock_info' => $stockinfo, $stockinfo, 'hidden_count' => $hidden_count];
    }

    public function getHiddenItems()
    {
        return Product::where('discontinued', true)->get();
    }

    public function StoreStockAdjustment(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'adjust_type' => 'required',
            'qty' => 'required|integer',
            'adjusted_at' => 'required|date'
        ]);

        $stockAdjust = new Adjust;
        $stockAdjust->product_id = $request->product_id;
        $stockAdjust->type = $request->adjust_type;
        $stockAdjust->qty = $request->adjust_type == 'decrease' ? -$request->qty : $request->qty;
        $stockAdjust->adjusted_at = $request->adjusted_at;
        $stockAdjust->save();
        return $stockAdjust::with('product')->find($stockAdjust->id);

    }

    public function purchasehistory($id)
    {
        $product = Product::findOrFail($id);
        $purchase_history = DB::table('product_purchase')->join('products', 'product_purchase.product_id', '=', 'products.id')->join('suppliers', 'product_purchase.supplier_id', '=', 'suppliers.id')->select('product_purchase.*', 'products.product_name', 'suppliers.name')->where('product_id', '=', $id)->orderBy('purchased_at', 'desc')->get();

        return view('admin.stock.purchasehistory', compact('product', 'purchase_history'));
    }

    public function saleshistory($id)
    {
        $product = Product::findOrFail($id);
        $sales_history = DB::table('product_sale')->join('products', 'product_sale.product_id', '=', 'products.id')->join('users', 'product_sale.user_id', '=', 'users.id')->select('product_sale.*', 'products.product_name', 'users.name')->where('product_id', '=', $id)->orderBy('sales_at', 'desc')->get();

        return view('admin.stock.saleshistory', compact('product', 'sales_history'));
    }

    public function returnhistory($id)
    {
        $product = Product::findOrFail($id);
        $return_history = DB::table('product_returnproduct')->join('products', 'product_returnproduct.product_id', '=', 'products.id')->join('users', 'product_returnproduct.user_id', '=', 'users.id')->select('product_returnproduct.*', 'products.product_name', 'users.name')->where('product_id', '=', $id)->orderBy('returned_at', 'desc')->get();

        return view('admin.stock.returnhistory', compact('product', 'return_history'));
    }

    public function freehistory($id)
    {
        $product = Product::findOrFail($id);
        $free_history = DB::table('product_sale')->join('products', 'product_sale.product_id', '=', 'products.id')->join('users', 'product_sale.user_id', '=', 'users.id')->select('product_sale.*', 'products.product_name', 'users.name')->where('product_sale.product_id', '=', $id)->where('product_sale.free', '>', 0)->orderBy('sales_at', 'desc')->get();

        return view('admin.stock.freehistory', compact('product', 'free_history'));
    }

    public function stockreport()
    {
        return view('admin.stock.report');
    }

    public function stockreportshow(Request $request)
    {
        $request->validate([
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $products = Product::where('discontinued', false)
            ->orderBy('product_name', 'ASC')->get();;
        $stock = [];
        foreach ($products as $pd) {
            $all_qty = $this->_getStockQtyByProductID($pd->id);

            $return_qty = DB::table('product_returnproduct')->where('product_id', '=', $pd->id)->whereBetween('returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $purchase_qty = DB::table('product_purchase')->where('product_id', '=', $pd->id)->whereBetween('purchased_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $sell_qty = DB::table('product_sale')->where('product_id', '=', $pd->id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $free_qty = DB::table('product_sale')->where('product_id', '=', $pd->id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('free');

            $adjust_qty = DB::table('adjusts')->where('product_id', '=', $pd->id)->whereBetween('adjusted_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $current_date_range_qty = (($return_qty + $purchase_qty) - ($sell_qty + $free_qty)) + $adjust_qty;

            $prev_qty = $all_qty - $current_date_range_qty;

            $stock[] = ['product_id' => $pd->id, 'product_name' => $pd->product_name, 'prev_qty' => $prev_qty, 'sell_qty' => $sell_qty, 'free_qty' => $free_qty, 'adjust_qty' => $adjust_qty, 'return_qty' => $return_qty, 'purchase_qty' => $purchase_qty, 'current_stock' => $all_qty];
        }


        return view('admin.stock.show', compact('stock', 'request'));
    }

    public function stockreportpdf(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();;
        $general_opt_value = json_decode($general_opt->options, true);

        $products = Product::where('discontinued', false)
            ->orderBy('product_name', 'ASC')->get();;
        $stock = [];
        foreach ($products as $pd) {
            $all_qty = $this->_getStockQtyByProductID($pd->id);

            $return_qty = DB::table('product_returnproduct')->where('product_id', '=', $pd->id)->whereBetween('returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $purchase_qty = DB::table('product_purchase')->where('product_id', '=', $pd->id)->whereBetween('purchased_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $sell_qty = DB::table('product_sale')->where('product_id', '=', $pd->id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $free_qty = DB::table('product_sale')->where('product_id', '=', $pd->id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('free');

            $adjust_qty = DB::table('adjusts')->where('product_id', '=', $pd->id)->whereBetween('adjusted_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])->sum('qty');

            $current_date_range_qty = (($return_qty + $purchase_qty) - ($sell_qty + $free_qty)) + $adjust_qty;

            $prev_qty = $all_qty - $current_date_range_qty;


            $stock[] = ['product_id' => $pd->id, 'product_name' => $pd->product_name, 'prev_qty' => $prev_qty, 'sell_qty' => $sell_qty, 'free_qty' => $free_qty, 'adjust_qty' => $adjust_qty, 'return_qty' => $return_qty, 'purchase_qty' => $purchase_qty, 'current_stock' => $all_qty];
        }

        $pdf = PDF::loadView('admin.stock.stockpdf', compact('stock', 'request', 'general_opt_value'));
        return $pdf->download('Stock Report From' . $request->start . 'to ' . $request->end . '.pdf');
    }

    public function export(Request $request)
    {
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        function currentproductStock($id)
        {
            $sale = DB::table('product_sale')->where('product_id', '=', $id)->sum('qty');
            $free = DB::table('product_sale')->where('product_id', '=', $id)->sum('free');
            $purchase = DB::table('product_purchase')->where('product_id', '=', $id)->sum('qty');
            $return = DB::table('product_returnproduct')->where('product_id', '=', $id)->sum('qty');
            $adjust_qty = DB::table('adjusts')->where('product_id', '=', $id)->sum('qty');
            $stock = (($return + $purchase) - ($sale + $free)) + $adjust_qty;
            return $stock;
        }

        $products = Product::where('discontinued', false)->orderBy('product_name', 'ASC')->get();
        $stock = [];
        foreach ($products as $pd) {
            $all_qty = currentproductStock($pd->id);
            $stock[] = ['product_id' => $pd->id, 'product_name' => $pd->product_name, 'current_stock' => $all_qty];
        }
        $pdf = PDF::loadView('admin.stock.stockexport', compact('stock', 'general_opt_value'));
        return $pdf->download('Stock Report' . time() . '.pdf');
    }

    public function dateWiseProduct()
    {
        $products = Product::where('discontinued', false)->get();
        return view('general_report.product_report', compact('products'));
    }

    function getStartAndEndDateStringUsingWeekNumber($week, $year): string
    {
        $ret = "";
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $ret .= $dto->format('d-M') . ' To ';
        $dto->modify('+6 days');
        $ret .= $dto->format('d-M') . "," . $dto->format('Y');
        return $ret;
    }

    function getFormattedDayString($day, $month_id, $year): string
    {
        return "{$day}-" . getMonthName($month_id) . "-$year";
    }

    public function getFormattedMonthString($month_id, $year): string
    {
        return getMonthName($month_id) . "-$year";
    }

    public function getDateRangeString($filter_type, $item)
    {
        if ($filter_type === 'day') {
            return $this->getFormattedDayString($item->day, $item->month, $item->year);
        } else if ($filter_type === 'month') {
            return $this->getFormattedMonthString($item->month, $item->year);
        } else if ($filter_type === 'week') {
            return $this->getStartAndEndDateStringUsingWeekNumber($item->week, $item->year);
        }
    }

    function chartDataMapping($chart_array, $filter_type)
    {
        return $chart_array->map(function ($item) use ($filter_type) {
            $map_data['date_range_string'] = $this->getDateRangeString($filter_type, $item);
            $map_data['qty'] = $item->qty;
            $map_data['type'] = $item->type;
            return $map_data;
        });
    }

    public function generateProductChartData(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date',
            'end' => 'required|date',
            'product_id' => 'required|integer',
            'group_by' => 'required',
        ]);


        $sales_chart = DB::table('product_sale')
            ->where('product_id', '=', $request->product_id)
            ->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->when($request->group_by == 'week', function ($q) {
                $q->select(DB::raw('WEEK(sales_at) as week, MONTH(sales_at) as month, YEAR(sales_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(sales_at), MONTH(sales_at), WEEK(sales_at)'))
                    ->orderBy('week', 'desc');
            })
            ->when($request->group_by == 'day', function ($q) {
                $q->select(DB::raw('WEEK(sales_at) as week,DAY(sales_at) as day, MONTH(sales_at) as month, YEAR(sales_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(sales_at),DAY(sales_at), MONTH(sales_at), WEEK(sales_at)'))
                    ->orderBy('day', 'desc');
            })
            ->when($request->group_by == 'month', function ($q) {
                $q->select(DB::raw('MONTH(sales_at) as month, YEAR(sales_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(sales_at), MONTH(sales_at)'))
                    ->orderBy('month', 'desc');
            })
            ->addSelect(DB::raw("'sales_chart' as type"))
            ->get();

        if (count($sales_chart) > 0) {
            if ($request->group_by == 'week') {
                $sales_chart = $this->chartDataMapping($sales_chart, 'week');
            } else if ($request->group_by == 'month') {
                $sales_chart = $this->chartDataMapping($sales_chart, 'month');
            } else if ($request->group_by == 'day') {
                $sales_chart = $this->chartDataMapping($sales_chart, 'day');
            }
        }

        $return_chart = DB::table('product_returnproduct')
            ->where('product_id', '=', $request->product_id)
            ->whereBetween('returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->when($request->group_by == 'week', function ($q) {
                $q->select(DB::raw('WEEK(returned_at) as week, MONTH(returned_at) as month, YEAR(returned_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(returned_at), MONTH(returned_at), WEEK(returned_at)'))
                    ->orderBy('week', 'desc');
            })
            ->when($request->group_by == 'day', function ($q) {
                $q->select(DB::raw('WEEK(returned_at) as week,DAY(returned_at) as day, MONTH(returned_at) as month, YEAR(returned_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(returned_at),DAY(returned_at), MONTH(returned_at), WEEK(returned_at)'))
                    ->orderBy('day', 'desc');
            })
            ->when($request->group_by == 'month', function ($q) {
                $q->select(DB::raw('MONTH(returned_at) as month, YEAR(returned_at) as year, SUM(qty) as qty'))
                    ->groupBy(DB::raw('YEAR(returned_at), MONTH(returned_at)'))
                    ->orderBy('month', 'desc');
            })
            ->addSelect(DB::raw("'return_chart' as type"))
            ->get();

        if (count($return_chart) > 0) {
            if ($request->group_by == 'week') {
                $return_chart = $this->chartDataMapping($return_chart, 'week');
            } else if ($request->group_by == 'month') {
                $return_chart = $this->chartDataMapping($return_chart, 'month');
            } else if ($request->group_by == 'day') {
                $return_chart = $this->chartDataMapping($return_chart, 'day');
            }
        }

        return ['sale_chart' => $sales_chart, 'return_chart' => $return_chart];
    }

    public function showDateWiseProduct(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date',
            'end' => 'required|date',
            'product_id' => 'required|integer',
            'group_by' => 'required',
        ]);
        $products = Product::all();
        $sales_history = DB::table('product_sale')->join('products', 'product_sale.product_id', '=', 'products.id')
            ->where('product_id', '=', $request->product_id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->join('users', 'product_sale.user_id', '=', 'users.id')
            ->select('product_sale.id', 'product_sale.sales_at as date', 'product_sale.qty', 'product_sale.price', 'products.product_name', 'users.name as customer_name')
            ->addSelect(DB::raw("'Sales' as type"))
            ->get();


        $return_history = DB::table('product_returnproduct')
            ->where('product_id', '=', $request->product_id)
            ->join('products', 'product_returnproduct.product_id', '=', 'products.id')
            ->join('users', 'product_returnproduct.user_id', '=', 'users.id')
            ->whereBetween('product_returnproduct.returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->select('product_returnproduct.id','product_returnproduct.returned_at as date', 'product_returnproduct.qty', 'product_returnproduct.price', 'products.product_name', 'users.name as customer_name')
            ->addSelect(DB::raw("'Returns' as type"))
            ->get();

        $merge_data = $sales_history
            ->merge($return_history);
        $sorted_product_data = $merge_data->sortDesc()->values()->all();
        return view('general_report.show_product_report', compact('sorted_product_data', 'request', 'products'));

    }

    public function productDetails($id, Request $request )
    {
        $date = $request->query('date');

        $productData = DB::table('product_sale')
            ->join('products', 'product_sale.product_id', '=', 'products.id')
            ->leftJoin('sales', 'product_sale.sale_id', '=', 'sales.id') 
            ->leftJoin('expenses', function ($join) {
                $join->on(DB::raw('DATE(expenses.expense_date)'), '=', DB::raw('DATE(product_sale.sales_at)'));
            })
            ->where('product_sale.id', $id)
            ->select(
                'product_sale.*',
                'products.product_name',
                'sales.approved_by',
                'expenses.amount as expense_amount',
                'expenses.reasons',
                'product_sale.sales_at',
                DB::raw('product_sale.price * product_sale.qty as Amount'), // Calculate the Amount
                DB::raw('(product_sale.price * product_sale.qty) - IFNULL(expenses.amount, 0) as netcost') // Calculate netcost
            )
            ->first();
    
        if (!$productData) {
            abort(404, "Product Sale not found");
        }

        $allProductsData = DB::table('product_sale')
            ->join('products', 'product_sale.product_id', '=', 'products.id')
            ->leftJoin('sales', 'product_sale.sale_id', '=', 'sales.id') 
            ->leftJoin('expenses', function ($join) {
                $join->on(DB::raw('DATE(expenses.expense_date)'), '=', DB::raw('DATE(product_sale.sales_at)'));
            })
            ->whereRaw("DATE(product_sale.sales_at) = ?", [$date]) 
            ->select(
                'product_sale.id', 
                'product_sale.product_id',
                'products.product_name',
                'product_sale.qty',
                'product_sale.price',
                'product_sale.sales_at',
                'sales.approved_by',
                DB::raw('COALESCE(SUM(expenses.amount), 0) as expense_amount'),  
                DB::raw('GROUP_CONCAT(expenses.reasons) as reasons'),  
                DB::raw('product_sale.price * product_sale.qty as Amount'),
                DB::raw('(product_sale.price * product_sale.qty) - COALESCE(SUM(expenses.amount), 0) as netcost')
            )
            ->groupBy(
                'product_sale.id', 
                'product_sale.product_id', 
                'products.product_name', 
                'product_sale.qty', 
                'product_sale.price', 
                'product_sale.sales_at', 
                'sales.approved_by'
            )
            ->get();
            
        $totalSales = $allProductsData->sum('Amount');
        $totalNetProfit = $allProductsData->sum('netcost'); 
        
        
        $allProductsData->each(function ($product) use ($totalSales, $totalNetProfit) {
            
            $product->proportional_expense = ($product->Amount / $totalSales) * $product->expense_amount;
            
            $product->net_profit = $product->Amount - $product->proportional_expense;
        
            $product->total_net_profit = $totalNetProfit;
        });
        $netcashData = $this->getNetcashData($productData);
    
        $response = [
            'netcash_data' => $netcashData,
        ];
    
        $request = request();

        if (!$request->wantsJson()) {
            return view('general_report.product_details', compact('productData','allProductsData','totalSales', 'request'));
        }

        return response()->json($response);
    }
    
    private function getNetcashData($productData)
    {
        $netcashData = [
            'netcash_month_label' => [],
            'netcash_values' => [],
        ];
        $salesMonth = date('d F Y', strtotime($productData->sales_at)); 
       
        //$netcash = round($productData->netcost); 
    
        $netcashData['netcash_month_label'][] = $salesMonth;
        //$netcashData['netcash_values'][] = $netcash;
    
        return $netcashData;
    }




    // public function productDetails($id)
    // {
        
    //     $productData = DB::table('product_sale')
    //         ->join('products', 'product_sale.product_id', '=', 'products.id')
    //         ->leftJoin('sales', 'product_sale.sale_id', '=', 'sales.id') 
    //         ->leftJoin('expenses', function ($join) {
    //             $join->on(DB::raw('DATE(expenses.expense_date)'), '=', DB::raw('DATE(product_sale.sales_at)'));
    //         })
    //         ->where('product_sale.id', $id)
    //         ->select(
    //             'product_sale.*',
    //             'products.product_name',
    //             'sales.approved_by',
    //             'expenses.amount as expense_amount',
    //             'expenses.reasons',
    //             'product_sale.sales_at',
    //             DB::raw('product_sale.price * product_sale.qty as Amount'), // Calculate the Amount
    //             DB::raw('(product_sale.price * product_sale.qty) - IFNULL(expenses.amount, 0) as netcost') // Calculate netcost
    //         )
    //         ->first();
    
    //     if (!$productData) {
    //         abort(404, "Product Sale not found");
    //     }
    
    //     $netcashData = $this->getNetcashData($productData);
    
    //     $response = [
    //         'netcash_data' => $netcashData,
    //     ];
    
    //     $request = request();

    //     if (!$request->wantsJson()) {
    //         return view('general_report.product_details', compact('productData', 'request'));
    //     }

    //     return response()->json($response);
    // }
    
    // private function getNetcashData($productData)
    // {
    //     $netcashData = [
    //         'netcash_month_label' => [],
    //         'netcash_values' => [],
    //     ];
    //     $salesMonth = date('d F Y', strtotime($productData->sales_at)); 
    //     $netcash = round($productData->netcost); 
    
    //     $netcashData['netcash_month_label'][] = $salesMonth;
    //     $netcashData['netcash_values'][] = $netcash;
    
    //     return $netcashData;
    // }
    
    
    

    public function exportDateWiseProduct(Request $request)
    {
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        $products = Product::where('discontinued', false)->get();
        $sales_history = DB::table('product_sale')->join('products', 'product_sale.product_id', '=', 'products.id')
            ->where('product_id', '=', $request->product_id)->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->join('users', 'product_sale.user_id', '=', 'users.id')
            ->select('product_sale.sales_at as date', 'product_sale.qty', 'product_sale.price', 'products.product_name', 'users.name as customer_name')
            ->addSelect(DB::raw("'Sales' as type"))
            ->get();


        $return_history = DB::table('product_returnproduct')
            ->where('product_id', '=', $request->product_id)
            ->join('products', 'product_returnproduct.product_id', '=', 'products.id')
            ->join('users', 'product_returnproduct.user_id', '=', 'users.id')
            ->whereBetween('product_returnproduct.returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
            ->select('product_returnproduct.returned_at as date', 'product_returnproduct.qty', 'product_returnproduct.price', 'products.product_name', 'users.name as customer_name')
            ->addSelect(DB::raw("'Returns' as type"))
            ->get();

        $merge_data = $sales_history
            ->merge($return_history);
        $sorted_product_data = $merge_data->sortDesc()->values()->all();
        $pdf = PDF::loadView('general_report.export_product_report', compact('sorted_product_data', 'request', 'products', 'general_opt_value'));
        Storage::put('public/productreport/' . 'Product Report from-' . $request->start . '-to-' . $request->end . '.pdf', $pdf->output());
        return $pdf->download('Product Report from ' . $request->start . ' to ' . $request->end . '.pdf');
    }

    public function hideFromStock($id)
    {
        $product = Product::findOrFail($id);
        $product->discontinued = true;
        $product->save();
        return $product;
    }

    public function restoreFromStock($id)
    {
        $product = Product::findOrFail($id);
        $product->discontinued = false;
        $product->save();
        return $product;
    }

    public function updateAdjust(Request $request, $id)
    {
        $adjust = Adjust::findOrFail($id);
        $adjust->adjusted_at = $request->adjusted_at;
        $adjust->qty = $request->qty;
        $adjust->notes = $request->notes;
        $adjust->save();
        return $adjust;
    }

    public function getStockBySingleProduct($id){
        $adjust =  DB::table('adjusts')->where('product_id', '=', $id)->sum('qty');
        $sale =  DB::table('product_sale')->where('product_id', '=', $id)->sum('qty');
        $free =  DB::table('product_sale')->where('product_id', '=', $id)->sum('free');
        $purchase = DB::table('product_purchase')->where('product_id', '=', $id)->sum('qty');
        $return = DB::table('product_returnproduct')->where('product_id', '=', $id)->sum('qty');
        $stock = (($return+$purchase)-($sale+$free))+$adjust;
        return response()->json(['stock' => $stock]);
    }


}
