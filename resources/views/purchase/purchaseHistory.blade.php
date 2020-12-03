@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Invoice</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Invoice</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox invoice">
        <div class="invoice-header">
            <div class="row">
                <div class="col-6">
                    <div class="invoice-logo">
                    <img src="{{asset('asset')}}/assets/img/logos/logo-vue.png" height="65px" />
                    </div>
                </div>
                <div class="col-6 text-right">
                    <p style="font-weight: bold;font-size:25px">Invoice #</p>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-6">
                    <div>
                        <ul class="list-unstyled m-t-10">
                        <li class="m-b-5"><span style="font-weight: bold">Name: </span>{{$purchase->sup_name}} </li>
                            <li class="m-b-5"> <span style="font-weight: bold">Address: </span>{{$purchase->address}} </li>
                            <li class="m-b-5"> <span style="font-weight: bold">Company: </span> {{$purchase->shopName}}</li>
                            <li class="m-b-5"> <span style="font-weight: bold">Phone: </span> {{$purchase->phone}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="clf" style="margin-bottom:30px;">
                        <dl class="row pull-right" style="width:400px;"><dt class="col-sm-6">Purchase Date</dt>
                            <dd class="col-sm-6">{{$purchase->purchase_date}}</dd><dt class="col-sm-6">Purchase ID</dt>
                        <dd class="col-sm-6">{{$purchase->purchase_no}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped no-margin table-invoice">
            <thead>
                <tr>
                    <th class="text-right">Sl</th>
                    <th class="text-right">Item</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($purchaseDetails as $key=>$row)
                <tr class="text-right">
                    <td>{{$key+1}}</td>
                    <td>{{$row->product->name}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->unit_cost}}</td>
                    <td>{{$row->total}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        <table class="table no-border">
            <thead>
                <tr>
                    <th></th>
                    <th width="68%"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td style="font-weight: bold">Payment Type: {{$purchase->payment_type}}</td>
                    <td style="font-weight: bold" class="text-right">Subtotal:</td>
                    <td class="text-right">{{$purchase->sub_total}}</td>
                </tr>
                <tr >
                    <td style="font-weight: bold">Pyment: {{$purchase->pay}}</td>
                    <td class="text-right">TAX 21%:</td>
                    <td class="text-right">{{$purchase->tax}}</td>
                </tr>
                <tr class="">
                <td style="font-weight: bold">Due: <?php if($purchase->due == Null) echo "0" ?> {{$purchase->due}}</td>
                    <td class="font-bold font-18 text-right">TOTAL:</td>
                    <td class="font-bold font-18 text-right">{{$purchase->total}}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
    <style>
        .invoice {
            padding: 20px
        }

        .invoice-header {
            margin-bottom: 50px
        }

        .invoice-logo {
            margin-bottom: 50px;
        }

        .table-invoice tr td:last-child {
            text-align: right;
        }
    </style>
</div>
@endsection