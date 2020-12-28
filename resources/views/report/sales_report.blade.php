@extends('layout.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <table class="table table-bordered table-hover"  cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216)">
                    <tr>
                        <th>Sr</th>
                        <th>Order No</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales_report as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->order_no}}</td>
                        <td>{{$row->order_date}}</td>
                        <td>{{$row->customer_name}}</td>
                        <td>{{$row->total}}</td>
                        <td>
                            <span class="badge badge-pill badge-success">{{$row->status}}</span>
                        </td>
                        <td>
                        <a href="{{route('salesSuccess.history',$row->id)}}" class="badge badge-pill badge-primary"><i class="fa fa-eye"></i> View History</a>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection