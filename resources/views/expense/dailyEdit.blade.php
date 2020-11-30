@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Expense</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('daily.expense')}}" class="btn btn-primary btn-sm">Daily Expense</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.dailyexpense',$dailyEdit->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Details</label>
                                <textarea name="detail" id="" cols="30" rows="3" class="form-control">{{$dailyEdit->detail}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$dailyEdit->amount}}">
                            </div>
                                <input type="hidden" name="date" value="{{date('d/m/y')}}">
                                <input type="hidden" name="month" value="{{date('F')}}">
                                <input type="hidden" name="year" value="{{date('Y')}}">
                            <div class="text-right pt-2">
                                <input type="submit" value="Update" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection