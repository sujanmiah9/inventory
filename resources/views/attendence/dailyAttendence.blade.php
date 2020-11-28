@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Daily Attendence</li>
    </ol>
</div>
@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->any() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="row">
                <h4 class="col-md-6">Daily Attendence</h4>
                <div class="col-md-6">
                    <a href="{{route('create.category')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('store.attendence')}}" method="POST">
                @csrf
            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($employee as $key=> $row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <img src="{{URL::to($row->photo)}}" alt="" style="height: 80px;width:80px">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$row->id}}" name="emp_id[]">
                                        <input type="radio" value="Present" name="attendence[{{$row->id}}]"> Present
                                        <input type="radio" value="Absence" name="attendence[{{$row->id}}]"> Absence
                                        <input type="hidden" value="{{date('d/m/y')}}" name="date">
                                        <input type="hidden" value="{{date('d_m_y')}}" name="edit_date">
                                        <input type="hidden" value="{{date('F')}}" name="month">
                                    </div>
                                </td>
                            </tr> 
                        @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <input type="submit" value="Add" class="btn btn-danger btn-lg">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection