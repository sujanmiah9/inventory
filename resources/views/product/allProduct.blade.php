@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">All Product</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView">
            <div class="row">
                <h4 class="col-md-6">All Product</h4>
                <div class="col-md-6">
                    <a href="{{route('create.product')}}" class="btn btn-light btn-sm float-right"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Selling Price</th>
                        <th>Route</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Selling Price</th>
                        <th>Route</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($product as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->code}}</td>
                            <td>{{$row->selPrice}}</td>
                            <td>{{$row->route}}</td>
                            <td>
                                <img src="{{URL::to($row->photo)}}" style="height: 80px; width:80px" alt="">
                            </td>
                            <td>
                                <a href="{{route('edit.product',$row->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('delete.product',$row->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="{{route('view.product',$row->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection