@extends('layouts.adminlayout')
@section('title','Challan')
@section('content')
    <section class="invoice_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-lg-12">
                                    <a href="{{route('challan.index')}}" class="btn btn-info btn-sm mb-5"><i
                                            class="fa fa-angle-left"></i> back</a>
                            </div>

                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-money-bill-alt"></i> Challan Details
                                    <small
                                        class="float-right">Challan Date: {{ date('d-M-Y', strtotime($challanInfo->challan_date))}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <h5 class="mt-3">From</h5>
                                <hr>
                                <table class="table table-borderless">

                                    <tr>
                                        <th>Customer Name:</th>
                                        <td><strong>{{$challanInfo->customer}}</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{$challanInfo->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{$challanInfo->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Challan Date:</th>
                                        <td>{{date('d-M-Y', strtotime($challanInfo->challan_date))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Date:</th>
                                        <td>{{date('d-M-Y', strtotime($challanInfo->delivery_date))}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <br>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($challanInfo->products as  $key => $singleProduct)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$singleProduct->product_name}}</td>
                                            <td>{{$singleProduct->pivot->qty}} &nbsp; {{$singleProduct->pivot->unit}} </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->

                            <!-- accepted payments column -->
                            <div class="col-6 mt-5">

                                Service Provided By :
                                <hr>
                                <strong> {{$challanInfo->created_by}} <small> <br>
                                        at {{$challanInfo->created_at->format('d-M-Y g:i a')}}</small> </strong>
                            </div>

                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                    <form action="{{route('challan.pdf',$challanInfo->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary float-right"
                                                style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

