<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Product;
use Carbon\Carbon;
use App\GeneralOption;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class GeneralOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:general_options.show')->only('index');
        $this->middleware('permission:general_options.update')->only('update');
    }


    public function index()
    {
        $g_opt = GeneralOption::first();
        $g_opt_value = json_decode($g_opt->options, true);
        $admins = Admin::all();
        $products = Product::with('size')->orderBy('product_name','asc')->get();
        return view('g_opt.index', compact('g_opt', 'g_opt_value','admins','products'));
    }

    public function edit($id)
    {
        return false;
    }

    public function update(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request, [
            'inv_invoice_heading' => 'required|max: 30',
            'inv_invoice_email' => 'required|max: 30',
            'inv_invoice_phone' => 'required|max:15',
            'inv_invoice_address' => 'required|max: 100',
        ]);
        $g_opt = GeneralOption::first();
        $g_opt_value = json_decode($g_opt->options, true);

        $option_arr = [];

        $image_name = $g_opt_value['inv_invoice_logo'];

        if ($request->hasFile('inv_invoice_logo')) {
            //get form image
            $image = $request->file('inv_invoice_logo');
            $current_date = Carbon::now()->toDateString();
            //get unique name for image
            $image_name = time() . "-" . $current_date . "." . $image->getClientOriginalExtension();

            //new location for new image
            $image_location = public_path('uploads/logo/invoicelogo/' . $image_name);
            //resize image for category and upload temp
            Image::make($image)->save($image_location);
        }

        $challan_image_name = isset($g_opt_value['challan_note_image']) ? $g_opt_value['challan_note_image'] : "";

        if ($request->hasFile('challan_note_image')) {
            $image = $request->file('challan_note_image');
            $current_date = Carbon::now()->toDateString();
            $challan_image_name = rand(1,999)."_".time() . "-" . $current_date . "." . $image->getClientOriginalExtension();
            $challan_image_location = public_path('uploads/'. $challan_image_name);
            Image::make($image)->save($challan_image_location);
        }



        $option_arr += [
            'challan_notes' => $request->challan_notes ?? "",
            'challan_note_image' => $challan_image_name,
            'inv_diff_invoice_heading' => $request->inv_diff_invoice_heading ?? 0,
            'inv_invoice_heading' => $request->inv_invoice_heading ?? "",
            'auto_signature_inv' => $request->auto_signature_inv ?? 0,
            'inv_invoice_email' => $request->inv_invoice_email,
            'inv_invoice_address' => $request->inv_invoice_address,
            'inv_invoice_logo' => $image_name,
            'inv_invoice_phone' => $request->inv_invoice_phone,
            'featured_product_for_invoice' => $request->featured_product_for_invoice,
            'cust_sales_invoice_includes_product' =>  $request->cust_sales_invoice_includes_product ?? 0,
            'cust_return_invoice_includes_product' =>  $request->cust_return_invoice_includes_product ?? 0,
            'max_product_character_allowed' =>  $request->max_product_character_allowed ?? 350,
            'sms_delay_in_days' =>  $request->sms_delay_in_days ?? 3,
            'admin_sales_invoice_created_notify' =>  $request->admin_sales_invoice_created_notify ?? 0,
            'admin_list_sales_invoice_created_notify' =>  $request->admin_list_sales_invoice_created_notify ?? [],
            'admin_sales_invoice_edited_notify' =>  $request->admin_sales_invoice_edited_notify ?? 0,
            'admin_list_sales_invoice_edited_notify' =>  $request->admin_list_sales_invoice_edited_notify ?? [],
            'admin_sales_invoice_canceled_notify' =>  $request->admin_sales_invoice_canceled_notify ?? 0,
            'admin_list_sales_invoice_canceled_notify' =>  $request->admin_list_sales_invoice_canceled_notify ?? [],
            'admin_return_invoice_created_notify' =>  $request->admin_return_invoice_created_notify ?? 0,
            'admin_list_return_invoice_created_notify' =>  $request->admin_list_return_invoice_created_notify ?? [],
            'admin_return_invoice_edited_notify' =>  $request->admin_return_invoice_edited_notify ?? 0,
            'admin_list_return_invoice_edited_notify' =>  $request->admin_list_return_invoice_edited_notify ?? [],
            'admin_return_invoice_canceled_notify' =>  $request->admin_return_invoice_canceled_notify ?? 0,
            'admin_list_return_invoice_canceled_notify' =>  $request->admin_list_return_invoice_canceled_notify ?? [],
            'admin_cash_edited_notify' =>  $request->admin_cash_edited_notify ?? 0,
            'customer_sales_invoice_created_notify' =>  $request->customer_sales_invoice_created_notify ?? 0,
            'customer_sales_invoice_edited_notify' =>  $request->customer_sales_invoice_edited_notify ?? 0,
            'customer_sales_invoice_delivered_notify' =>  $request->customer_sales_invoice_delivered_notify ?? 0,
            'customer_sales_invoice_canceled_notify' =>  $request->customer_sales_invoice_canceled_notify ?? 0,
            'customer_return_invoice_created_notify' =>  $request->customer_return_invoice_created_notify ?? 0,
            'customer_return_invoice_edited_notify' =>  $request->customer_return_invoice_edited_notify ?? 0,
            'customer_return_invoice_canceled_notify' =>  $request->customer_return_invoice_canceled_notify ?? 0,
            'customer_cash_approval_notify' =>  $request->customer_cash_approval_notify ?? 0,
            'd_agent_sales_invoice_created_notify' =>  $request->d_agent_sales_invoice_created_notify ?? 0,
            'd_agent_sales_invoice_edited_notify' =>  $request->d_agent_sales_invoice_edited_notify ?? 0,
            'd_agent_sales_invoice_includes_product' =>  $request->d_agent_sales_invoice_includes_product ?? 0,
            'd_agent_list_sales_invoice_notify' =>  $request->d_agent_list_sales_invoice_notify ?? [],
            'admin_email_sales_invoice_created' =>  $request->admin_email_sales_invoice_created ?? 0,
            'admin_list_email_sales_invoice_created' =>  $request->admin_list_email_sales_invoice_created ?? [],
            'admin_email_sales_invoice_edited' =>  $request->admin_email_sales_invoice_edited ?? 0,
            'admin_list_email_sales_invoice_edited' =>  $request->admin_list_email_sales_invoice_edited ?? [],
            'admin_email_return_invoice_created' =>  $request->admin_email_return_invoice_created ?? 0,
            'admin_list_email_return_invoice_created' =>  $request->admin_list_email_return_invoice_created ?? [],
            'admin_email_return_invoice_edited' =>  $request->admin_email_return_invoice_edited ?? 0,
            'admin_list_email_return_invoice_edited' =>  $request->admin_list_email_return_invoice_edited ?? [],
        ];

        $g_opt = GeneralOption::findOrFail($id);
        $g_opt->options = $option_arr;
        $g_opt->save();
        Toastr::success('General Option  Updated Successfully', 'success');
        return redirect()->route('generaloption.index');
    }
}
