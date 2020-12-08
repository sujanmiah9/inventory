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
                                <h4>Add Product</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.product')}}" class="btn btn-primary btn-sm">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Category Name</label>
                                    <select name="cat_id" id="" class="form-control">
                                        @foreach ($category as $row)
                                            <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Name</label>
                                    <select name="sup_id" id="" class="form-control">
                                        @foreach ($supplier as $row)
                                            <option value="{{$row->id}}">{{$row->sup_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Product Code</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Product Route</label>
                                    <input type="text" class="form-control" name="route">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Buy Date</label>
                                    <input type="date" class="form-control" name="buyDate">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Expire Date</label>
                                    <input type="date" class="form-control" name="expireDate">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Buying Price</label>
                                    <input type="text" class="form-control" name="buyPrice">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Selling Price</label>
                                    <input type="text" class="form-control" name="selPrice">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Add" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection