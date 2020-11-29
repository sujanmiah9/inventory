@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header bgView">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Supplier</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-light btn-sm">All Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.supplier',$editSupplier->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Supplier Name</label>
                                <input type="text" class="form-control" name="sup_name" value="{{$editSupplier->sup_name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Supplier Email</label>
                                <input type="email" class="form-control" name="email" value="{{$editSupplier->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Supplier Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{$editSupplier->phone}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Shopname</label>
                                    <input type="text" name="shopName" class="form-control" value="{{$editSupplier->shopName}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$editSupplier->city}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" name="accountNumber" value="{{$editSupplier->accountNumber}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Account Holder</label>
                                    <input type="text" class="form-control" name="accountHolder" value="{{$editSupplier->accountHolder}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Bank Name</label>
                                    <input type="text" class="form-control" name="bankName" value="{{$editSupplier->bankName}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Bank Branch</label>
                                    <input type="text" class="form-control" name="bankBranch" value="{{$editSupplier->bankBranch}}">
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editSupplier->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control"> {{$editSupplier->address}}</textarea>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Update" class="btn btn-primary btn-block btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection