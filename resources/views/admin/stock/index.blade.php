@extends('layouts.admin-vue-layout')
@section('title','Stock Details')
@section('content')

        <stock-component
            csrf="{{csrf_token()}}"
            hidden_count="{{$hidden_count}}"
            todays_date="{{Carbon\Carbon::now()->toDateString()}}" base_url="{{url('/')}}"
            :stockinfo="{{json_encode($stock_info)}}"
            base_url="{{url('/')}}"
            :products="{{json_encode($products)}}"
        />
@endsection

