@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-weight-bold">@lang('crud.edit') @lang('models/invoices.singular')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{!! route('invoice.index') !!}">@lang('models/invoices.singular')</a></li>
                        <li class="breadcrumb-item active">@lang('crud.edit')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        @include('flash::message')
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white card-primary card-maroon">
                    <div class="card-header">
                    <h3 class="card-title">@lang('models/invoices.singular') Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-unbordered mb-3">
                            @include(strtolower(__('models/invoices.plural')).'.show_fields')
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
