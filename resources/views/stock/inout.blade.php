@extends('layout.app')


@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow"> 
                <div class="card-header text-white" style="background-color: #00AA9E;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-2">Stock Inward Report</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sr:ID</th>
                                <th>Date</th>
                                <th>P.Name</th>
                                <th>Quantity</th>
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
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white" style="background-color: #004aaa;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-1">Stock Outward Report</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="example-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example-table_length"><label>Show <select name="example-table_length" aria-controls="example-table" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="example-table" cellspacing="0" width="100%" role="grid" aria-describedby="example-table_info" style="width: 100%;">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr:ID: activate to sort column descending" style="width: 73.3889px;">Sr:ID</th><th class="sorting" tabindex="0" aria-controls="example-table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 73.3889px;">Date</th><th class="sorting" tabindex="0" aria-controls="example-table" rowspan="1" colspan="1" aria-label="P.Name: activate to sort column ascending" style="width: 104.389px;">P.Name</th><th class="sorting" tabindex="0" aria-controls="example-table" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending" style="width: 117.5px;">Quantity</th></tr>
                        </thead>
                        <tbody>
                        <tr role="row" class="odd">
                                <td class="sorting_1">fsf</td>
                                <td>fsd</td>
                                <td>fs</td>
                                <td>fs</td>
                            </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example-table_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example-table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example-table_previous"><a href="#" aria-controls="example-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example-table_next"><a href="#" aria-controls="example-table" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 