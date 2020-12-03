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
                    <p style="font-weight: bold">{{date('d/m/y')}} </p>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-6">
                    <div>
                        <ul class="list-unstyled m-t-10">
                        <li class="m-b-5"><span style="font-weight: bold">Name: {{$customer->name}}</span> </li>
                            <li class="m-b-5"> <span style="font-weight: bold">Address: </span> {{$customer->address}}</li>
                            <li class="m-b-5"> <span style="font-weight: bold">Company: </span> {{$customer->shopName}}</li>
                            <li class="m-b-5"> <span style="font-weight: bold">Phone: </span> {{$customer->phone}}</li>
                        </ul>
                    </div>
                </div>
                @php
                    $orders = DB::table('orders')->select('id')->get();
                    $count = count($orders)+1;
                    $order_no = date('Y').'-'."00".$count;
                @endphp
                <div class="col-6 text-right">
                    <div class="clf" style="margin-bottom:30px;">
                        <dl class="row pull-right" style="width:400px;"><dt class="col-sm-6">Purchase Date</dt>
                            <dd class="col-sm-6">{{date("F j, Y")}}</dd><dt class="col-sm-6">Purchase ID</dt>
                        <dd class="col-sm-6">{{$order_no}}</dd>
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
                @foreach ($content as $row)
                <tr class="text-right">
                    <td>{{$i++}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->qty}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->qty*$row->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table no-border">
            <thead>
                <tr>
                    <th></th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-right">
                    <td>Subtotal:</td>
                    <td>{{Cart::subtotal()}}</td>
                </tr>
                <tr class="text-right">
                    <td>TAX 21%:</td>
                    <td>{{Cart::tax()}}</td>
                </tr>
                <tr class="text-right">
                    <td class="font-bold font-18">TOTAL:</td>
                    <td class="font-bold font-18">{{Cart::total()}}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-success ml-3" type="button" data-toggle="modal" data-target="#staticBackdrop"> Sales</button>
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
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5  style="font-weight:bold; color:rgb(56, 174, 204)">Invoice of Purchase</h5>
            <h4 class="float-right" style="font-weight:bold; color:rgb(56, 174, 204)">Total: {{Cart::total()}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <form action="{{route('store.sales')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <input type="hidden" name="order_no" value="{{$order_no}}">
                        <input type="hidden" name="order_date" value="{{date("d/m/y")}}">
                        <input type="hidden" name="total_product" value="{{Cart::count()}}">
                        <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                        <input type="hidden" name="tax" value="{{Cart::tax()}}">
                        <input type="hidden" name="total" value="{{Cart::total()}}">
                        <div class="form-group">
                            <label for="">Payment Type</label>
                            <select name="payment_type" id="" class="form-control" required>
                                <option value="">Select Option</option>
                                <option value="Hand Cash">Hand Cash</option>
                                <option value="Check">Check</option>
                                <option value="Due">Due</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Pay</label>
                            <input type="text" class="form-control" name="pay" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Due</label>
                            <input type="text" class="form-control" name="due">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
        </div>
        </div>
    </div>
@endsection