@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Daily Expense</li>
    </ol>
</div>
@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
@php
    $date = date('d/m/y');
    $total = DB::table('expenses')->where('date', $date)->sum('amount');
@endphp
<div class="text-center">
    <span style="font-weight:bold; font-size:40px; color:red">Total: {{$total}}</span>
</div>
<span style="font-weight:bold; font-size:25px; color:blue">Daily Expense: {{date('d/m/y')}}</span>
<div class="page-content fade-in-up">
    <div class="card pt-2">
        <div class="card-header bg-primary text-white">
            <div class="row">
                <h4 class="col-md-6">Daily Expense</h4>
                <div class="col-md-6 text-right">
                    <a href="{{route('daily.expense')}}" class="btn btn-light">Daily</a>
                    <a href="{{route('monthly.expense')}}" class="btn btn-danger">Monthly</a>
                    <a href="{{route('yearly.expense')}}" class="btn btn-warning">Yearly</a>
                    <a href="{{route('create.expense')}}" class="btn btn-dark"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($dailyEx as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->detail}}</td>
                            <td>{{$row->amount}}</td>
                            <td>{{$row->date}}</td>
                            <td>
                                <a href="{{route('dailyEdit.expense',$row->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.dailyEx', $row->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection