<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
      $this->middleware('permission:business.chart');
  }


  public function index(){
      return view('charts.index');
  }

  public function show(Request $request){
    $this->validate($request,[
      'start' => 'required',
      'end' => 'required',
      'type' => 'required',
    ]);
    return view('charts.show',compact('request'));
  }

  public function getChartData(Request $request)
  {
      // Sales data
      $sales = DB::table('sales')
          ->select(DB::raw('MONTH(sales_at) as month, YEAR(sales_at) as year, SUM(amount) as amount'))
          ->whereBetween('sales_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
          ->groupBy(DB::raw('YEAR(sales_at), MONTH(sales_at)'))
          ->get();
  
      $sales_month_label = [];
      $sales_amount = [];
      foreach ($sales as $sale) {
          array_push($sales_month_label, getMonthName($sale->month) . ' ' . $sale->year);
          array_push($sales_amount, $sale->amount);
      }
      $sales_data = ['sales_month_label' => $sales_month_label, 'sales_amount' => $sales_amount];
  
      // Cashes data
      $cashes = DB::table('cashes')
          ->select(DB::raw('MONTH(received_at) as month, YEAR(received_at) as year, SUM(amount) as amount'))
          ->whereBetween('received_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
          ->groupBy(DB::raw('YEAR(received_at), MONTH(received_at)'))
          ->get();
  
      $cashes_month_label = [];
      $cash_amount = [];
      foreach ($cashes as $cash) {
          array_push($cashes_month_label, getMonthName($cash->month) . ' ' . $cash->year);
          array_push($cash_amount, $cash->amount);
      }
      $cashes_data = ['cashes_month_label' => $cashes_month_label, 'cash_amount' => $cash_amount];
  
      // Return products data
      $return_products = DB::table('returnproducts')
          ->select(DB::raw('MONTH(returned_at) as month, YEAR(returned_at) as year, SUM(amount) as amount'))
          ->whereBetween('returned_at', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
          ->groupBy(DB::raw('YEAR(returned_at), MONTH(returned_at)'))
          ->get();
  
      $return_products_month_label = [];
      $pd_return_amount = [];
      foreach ($return_products as $pd_return) {
          array_push($return_products_month_label, getMonthName($pd_return->month) . ' ' . $pd_return->year);
          array_push($pd_return_amount, $pd_return->amount);
      }
      $return_products_data = ['return_products_month_label' => $return_products_month_label, 'pd_return_amount' => $pd_return_amount];
  
      // Expenses data
      $expenses = DB::table('expenses')
          ->select(DB::raw('MONTH(expense_date) as month, YEAR(expense_date) as year, SUM(amount) as amount'))
          ->whereBetween('expense_date', [$request->start . " 00:00:00", $request->end . " 23:59:59"])
          ->groupBy(DB::raw('YEAR(expense_date), MONTH(expense_date)'))
          ->get();
  
      $expense_month_label = [];
      $expense_amount = [];
      foreach ($expenses as $expense) {
          array_push($expense_month_label, getMonthName($expense->month) . ' ' . $expense->year);
          array_push($expense_amount, $expense->amount);
      }
      $expenses_data = ['expense_month_label' => $expense_month_label, 'expense_amount' => $expense_amount];
  
      // Net Profit calculation
      $net_profit_month_label = [];
      $net_profit_amount = [];
      $months = array_unique(array_merge($sales_month_label, $cashes_month_label, $return_products_month_label, $expense_month_label));
  
      foreach ($months as $month) {
          $sales_value = in_array($month, $sales_month_label) ? $sales_amount[array_search($month, $sales_month_label)] : 0;
          $cash_value = in_array($month, $cashes_month_label) ? $cash_amount[array_search($month, $cashes_month_label)] : 0;
          $return_value = in_array($month, $return_products_month_label) ? $pd_return_amount[array_search($month, $return_products_month_label)] : 0;
          $expense_value = in_array($month, $expense_month_label) ? $expense_amount[array_search($month, $expense_month_label)] : 0;
  
          $net_profit = ($sales_value + $cash_value) - ($return_value + $expense_value);
          
          array_push($net_profit_month_label, $month);
          array_push($net_profit_amount, $net_profit);
      }
  
      $net_profit_data = ['net_profit_month_label' => $net_profit_month_label, 'net_profit_amount' => $net_profit_amount];
  
      return [
          'sales_data' => $sales_data,
          'cashes_data' => $cashes_data,
          'return_products_data' => $return_products_data,
          'expenses_data' => $expenses_data,
          'net_profit_data' => $net_profit_data
      ];
  }
  



}
