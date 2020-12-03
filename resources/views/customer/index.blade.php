@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">All Customers</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView text-white">
            <div class="row">
                <h4 class="col-md-6">All Customers</h4>
                <div class="col-md-6">
                    <a href="{{route('create.customer')}}" class="btn btn-light btn-sm float-right"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($customer as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->city}}</td>
                            <td>
                                <img src="{{URL::to($row->photo)}}" style="height: 80px; width:80px" alt="">
                            </td>
                            <td>
                                <a href="{{route('edit.customer',$row->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.customer',$row->id)}}" class="btn btn-danger">Delete</a>
                                <a href="{{route('view.customer',$row->id)}}" class="btn btn-success">View</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection