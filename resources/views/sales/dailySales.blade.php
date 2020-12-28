@extends('layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daily Product Sales List</li>
    </ol>
</nav>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header cardB">
                    <div class="row">
                    <div class="col-md-6">
                        <h4 class="heading_h4">Daily Product Sales List</h4>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
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
                            @foreach ($order as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->order_no}}</td>
                                <td>{{$row->order_date}}</td>
                                <td>{{$row->name}}</td>
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
    </div>
@endsection