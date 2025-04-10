<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Challan</title>


    <style>

        table {
            margin-bottom: .1rem;
            width: 100%;
            background-color: transparent;
            border-collapse: collapse;
        }

        .main-table, .main-table td, .main-table th {
            border: 1px solid black;
        }

        hr {
            margin: 0;
            border-top: 1px solid #000;
        }

        .summery-table tr {
            text-align: left;
        }

        .summery-table tr td {
            text-align: left;
        }

    </style>

</head>
<body style="background: #fff;font-size: 12px;font-family: Tahoma, sans-serif">

<div style="overflow: auto">
    <div style="width: 39%;display: inline-block;">
        <h4 style="text-align: center;margin-bottom: 25px;font-weight: bold;font-size:26px;border: 5px solid #000;border-radius: 20px ">Challan #{{$challanInfo->id}}</h4>
        <table style="text-align: left">
            <tr>
                <td><b>Customer Name:</b></td>
                <td><strong>{{$challanInfo->customer}}</strong></td>
            </tr>
            <tr>
                <td><b>Phone:</b></td>
                <td>{{$challanInfo->phone}}</td>
            </tr>
            <tr>
                <td><b>Address:</b></td>
                <td>{{$challanInfo->address}}</td>
            </tr>
            <tr>
                <td><b>Challan Date:</b></td>
                <td>{{date('d-M-Y', strtotime($challanInfo->challan_date))}}</td>
            </tr>
            <tr>
                <td><b>Delivery Date:</b></td>
                <td>{{date('d-M-Y', strtotime($challanInfo->delivery_date))}}</td>
            </tr>
            <tr>
                <td><b>Print Time:</b></td>
                <td>{{date("d-M-Y g:i a", strtotime(now()))}}</td>
            </tr>


        </table>

    </div>
    <div style="width: 20%;display: inline-block;margin-top: 15px">
                @php
                    $url = "https://api.qrserver.com/v1/create-qr-code/?data=".$challanInfo->customer." Challan ID: ".$challanInfo->id;
                @endphp
                @if($url)
                    <img style="width: 80%;" src="{{$url}}" alt="">
                @endif

    </div>
    <div style="width: 40%;display: inline-block;">
        <img style="width: 180px" src="{{asset('uploads/logo/cropped/'.$CompanyInfo->logo)}}" alt="">
        @if($g_opt_value ['inv_diff_invoice_heading'] == 1)

            <p style="font-weight: bold">{{$g_opt_value ['inv_invoice_heading']}}</p>
            <p>{{$g_opt_value ['inv_invoice_address']}} <br> <b>Email
                    :</b> {{$g_opt_value ['inv_invoice_email']}} <br> <b>Phone
                    :</b> {{$g_opt_value ['inv_invoice_phone']}}</p>

        @else
            <p style="font-weight: bold">{{$CompanyInfo->company_name}}</p>
            <p>{{$CompanyInfo->address}} <br> <b>Email :</b> {{$CompanyInfo->email}} <br>
                <b>Phone:</b> {{$CompanyInfo->phone}}</p>

        @endif


    </div>
{{--
    <p style="font-family: Serif">{!!  isset($g_opt_value ['challan_notes']) ? $g_opt_value ['challan_notes'] : '' !!}</p>
--}}

    @php
      $challan_warning_image =  isset($g_opt_value ['challan_note_image']) ? $g_opt_value ['challan_note_image'] : '';
      $challan_warning_image =  preg_replace('/\s+/', '', $challan_warning_image)
    @endphp
    @if(!empty($challan_warning_image))
    <img width="60%" src="{{asset('uploads/'.$challan_warning_image)}}" alt="">
    @endif
    <p><b>Challan Date: {{date('d-M-Y', strtotime($challanInfo->challan_date))}}</b> - <b>Challan ID: # {{$challanInfo->id}}</b></p>

</div>


<table class="main-table">
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

<div style="margin-top: 75px;">
    <div
        style="width: 33%;display: inline-block;text-align:center;">
        <p>{{$challanInfo->created_by}}</p>
        <hr>
        <p style="text-align:center">Service Provided By </p>

    </div>
    <div style="width: 33%;display: inline-block;text-align:center;margin-bottom: -30px">
        <p></p>
        <hr>
        <p style="text-align:center">Received By </p>
    </div>
    <div style="width: 33%;display: inline-block;text-align:center">
        <hr>
        <p style="text-align:center">Authorized By </p>
    </div>
</div>


</body>
</html>































