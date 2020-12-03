@extends('layout.app')
@section('content')
    <div class="row pt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header cardB">
                    <div class="row">
                    <div class="col-md-6">
                        <h4>Sales List</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('create.sales')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Purchase No</th>
                                <th>Purchase Date</th>
                                <th>Supplier Name</th>
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
                                <td>{{$row->customer->name}}</td>
                                <td>{{$row->total}}</td>
                                <td class="badge badge-pill badge-danger mt-2 ml-4">{{$row->status}}</td>
                                <td>
                                <a href="{{route('sales.history',$row->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> View </a>
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