@extends('layout.app')

@section('content')
    <div class="pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-light cardB">
                        <div class="row">
                            <h4 class="col-md-6">Add Sales</h4>
                            <div class="col-md-6">
                                <a href="{{route('detail.purchase')}}" class="btn btn-primary btn-sm float-right"> Sales</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="01/01/2020"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Purchase No</label>
                                        <input type="text" class="form-control" name="purchaseNo" placeholder="kkk-1000"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Supplier Name</label>
                                        <select name="supplierName" id="" class="form-control">
                                            @foreach ($supplier as $row)
                                                <option value="">{{$row->sup_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <select name="catName" id="" class="form-control">
                                            @foreach ($category as $row)
                                                <option value="">{{$row->cat_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <select name="supplierName" id="" class="form-control">
                                            @foreach ($product as $row)
                                                <option value="">{{$row->name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-4 pt-1">
                                    <br>
                                    <input type="submit" value="Add" class="btn btn-primary">
                                </div>
                            </div>
                    </form>

                    {{-- Datatables --}}
                    <div class="pt-5">
                        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Aciton</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection