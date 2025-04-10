<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:trade_price.index')->only('index');
        $this->middleware('permission:trade_price.edit')->only('tpindex','tpupdate');
    }

    public function index(){
        $products = Product::orderBy('product_name', 'ASC')->get();
        return view('price.index',compact('products'));
    }

    public function tpindex(){
        $products = Product::orderBy('product_name', 'ASC')->get();
        return view('tp.index',compact('products'));
    }

    public function tpupdate(Request $request,$id){
        $this->validate($request,[
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->tp = $request->price;
        $product->save();
        Session::flash('success','TP Updated Successfully');
        return redirect()->back();
    }
}
