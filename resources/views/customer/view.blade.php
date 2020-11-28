@extends('layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.customer')}}" class="btn btn-warning">All Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{$viewCustomer->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$viewCustomer->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$viewCustomer->phone}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$viewCustomer->address}}</td>
                            </tr>
                            <tr>
                                <th>Shop Name</th>
                                <td>{{$viewCustomer->shopName}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$viewCustomer->city}}</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>{{$viewCustomer->accountNumber}}</td>
                            </tr>
                            <tr>
                                <th>Account Holder</th>
                                <td>{{$viewCustomer->accountHolder}}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{$viewCustomer->bankName}}</td>
                            </tr>
                            <tr>
                                <th>Bank Branch</th>
                                <td>{{$viewCustomer->bankBranch}}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <img src="{{URL::to($viewCustomer->photo)}}" alt="" style="height: 80px; width:80px" >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection