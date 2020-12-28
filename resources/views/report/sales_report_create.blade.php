@extends('layout.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-5">
                <div class="card-header cardB">
                    <h4 class="heading_h4">Report Create</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('report.show')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="12/12/2020">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">End Date</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <div class="col-md-2">
                                <label for="">Report Type</label>
                                <select name="report_type" id="" class="form-control">
                                    <option value="sales">Sales Report</option>
                                    <option value="purchase">Purchase Report</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 pt-4">
                                <input type="submit" class="btn btn-success ml-3" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection