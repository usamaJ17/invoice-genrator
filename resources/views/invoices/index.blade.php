@extends('layouts.master')
@section('css')
@parent
    @include('invoices.filter_style')
@endsection
@section('content')
    <div class="content-header d-none">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-weight-bold">Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
  </div>
  <div class="content">
    @include('flash::message')
    <div class="bg-white card-primary card-maroon mt-3">
        <div class="card-header">
            <h3 class="card-title">Invoice Detail</h3>
        </div>
        <div class="card-body table-responsive" >
            @include('invoices.table')
        </div>
    </div>
</div>
@endsection

<style>
    .text-sm .card-title {
    font-size: 12px;
}
.card-header{
    padding:.50rem 1.25rem;
}
.text-sm .btn {
    font-size: 11px !important;
}
.text-sm {
    font-size: 11px !important;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
}
.btn-group-sm>.btn, .btn-sm {
    line-height: 1;
    padding: 7px 9px !important;
}
table.dataTable.table-sm > thead > tr > th {
    padding: 6px 10px !important;
    font-weight: 500;
    font-size: 12px;
}
.table td, .table th {
    padding: 0.002rem 0.6rem !important;
    vertical-align: middle;
    font-size: 12px;
}
.btn {
    padding: 0.275rem 0.75rem !important;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(2.05rem + 1px) !important;
    padding: 0.275rem 0.75rem !important;
    font-size: 12px;
    font-weight: 400;
    line-height: 1;
    }
</style>

