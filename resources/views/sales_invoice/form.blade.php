@extends('layouts.admin-vue-layout')
@section('title','Sales Invoice Form')
@section('content')
    <sales-invoice-component
        csrf="{{csrf_token()}}"
        :sales_info='{{ $method === "put"  ? json_encode($sales_info): json_encode((object) [])  }}'
        todays_date="{{Carbon\Carbon::now()->toDateString()}}"
        base_url="{{url('/')}}"
        :products='@json($products)'
        :customers='@json($customers)'
        method="{{$method}}"
        list_url="{{route('sales_invoice.index')}}"
        store_url="{{route('sales_invoice.store')}}"
        update_url="{{$method === 'put' ? route('sales_invoice.update',$id) : ''}}"
        :featured_product_ids='@json($featured_product_ids)'
        id="{{$id}}">
    </sales-invoice-component>
@endsection

