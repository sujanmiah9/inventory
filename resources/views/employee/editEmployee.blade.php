@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Employee</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.employee')}}" class="btn btn-primary">All Employee</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.employee',$editEmployee->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Employee Name</label>
                            <input type="text" class="form-control" value="{{$editEmployee->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Employee Email</label>
                                <input type="email" class="form-control" name="email" value="{{$editEmployee->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Employee Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{$editEmployee->phone}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Experiense</label>
                                    <input type="text" name="experiense" class="form-control" value="{{$editEmployee->experiense}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">NID No</label>
                                    <input type="text" class="form-control" name="nid" value="{{$editEmployee->nid}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control" name="salary" value="{{$editEmployee->salary}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Vacation</label>
                                    <input type="text" class="form-control" name="vacation" value="{{$editEmployee->vacation}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$editEmployee->city}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editEmployee->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control"> {{$editEmployee->address}}</textarea>
                            </div>
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