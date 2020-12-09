@extends('layout.app')


@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow"> 
                <div class="card-header text-white" style="background-color: #00aa55;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-2">Net Stock Report</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sr:ID</th>
                                <th>P.Name</th>
                                <th>Quantity</th>
                                <th>Reminder</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>fsf</td>
                                <td>fsd</td>
                                <td>fs</td>
                                <td>fs</td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 