@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
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
                                <h4>Add Supplier</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-primary btn-sm">All Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.supplier')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Supplier Name</label>
                                <input type="text" class="form-control" name="sup_name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Company Name</label>
                                    <input type="text" name="shopName" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" name="accountNumber">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Account Holder</label>
                                    <input type="text" class="form-control" name="accountHolder">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Bank Name</label>
                                    <input type="text" class="form-control" name="bankName">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bank Branch</label>
                                    <input type="text" class="form-control" name="bankBranch">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Supplier Type</label>
                                <select name="type" class="form-control">
                                    <option value="Distributor">Distributor</option>
                                    <option value="Whole Sailer">Whole Sailer</option>
                                    <option value="Brochure">Brochure</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="text-right pt-3">
                                <input type="submit" value="Add" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection