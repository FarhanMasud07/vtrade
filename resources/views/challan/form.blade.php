@extends('layouts.admin-vue-layout')
@section('title','Challan Form')
@section('content')
    <challan-component
        csrf="{{csrf_token()}}"
        todays_date="{{Carbon\Carbon::now()->toDateString()}}"
        base_url="{{url('/')}}"
        method="{{$method}}"
        id="{{$id}}"
    />
@endsection

