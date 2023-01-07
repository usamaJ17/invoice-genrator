@extends('layouts.master')

<style>
    .table td, .table th {
        padding: .25rem .75rem !important;
       font-size: .875rem!important;
       border-top: 1px solid #ababab !important;
       border:1px solid #ababab;
    }
    .table thead th{
        border:1px solid #ababab !important;
    }
    dl, ol, ul {
        margin-top: 0;
        margin-bottom: 0 !important;
    }
    td.left-custom{
        width: 35%;
        font-weight: 600;
    }
    td.right-custom{
        width: 65%;
    }
    .bg-gy th{
        background: #c9c9c9;
    }
    /* .sign-table{
        width: 175%;
    } */
</style>

@section('content')
    <div class="content">
        @include('flash::message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row no-print">
                            <div class="col-12" style="position: absolute;width: 100%;right: 15px;">
                              <button type="button" onclick="return window.print();" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</button>
                            </div>
                          </div>
                          {{-- <div class="col-xs-12 text-center">
                                <img
                                src="{{asset('dist/img/latter-header.jpeg')}}" style="width:100%;margin:auto;" />
                          </div> --}}
                        <h2 class="text-center text-weight-bold pb-1" style="text-transform: uppercase;">Tax @lang('models/invoices.singular')</h2>
                        <p class="text-center pb-5">{{ $invoice->trn }}</p>
                        <table class="table mb-4" border="2">
                            <tbody>
                                <tr>
                                    <th>@lang('models/invoices.fields.name')</th>
                                    <td>{{ $invoice->customer }}</td>
                                    <th>@lang('models/invoices.fields.date')</th>
                                    <td>{{ ($invoice->date) ? $invoice->date->format('Y-m-d H:i') : "" }}</td>
                                  </tr>
                                  <tr >
                                    <th>@lang('models/invoices.fields.authorized')</th>
                                    <td>{{ $invoice->authorized }}</td>
                                    <th>@lang('models/invoices.fields.no')</th>
                                    <td>{{ $invoice->invoice_no }}</td>
                                  </tr>
                                  <tr >
                                    <th>@lang('models/invoices.fields.phone')</th>
                                    <td>{{ $invoice->phone }}</td>                                    
                                    <th>@lang('models/invoices.fields.reference')</th>
                                    <td>{{ $invoice->reference }}</td>
                                </tr>
                                <tr >
                                    <th>@lang('models/invoices.fields.trn')</th>
                                    <td>{{ $invoice->trn }}</td>                                    
                                    <th>@lang('models/invoices.fields.payment')</th>
                                    <td>{{ $invoice->payment }}</td>
                                </tr>
                                <tr >
                                    <th >@lang('models/invoices.fields.address')</th>  
                                    <td>{{ $invoice->address }}</td>                                    
                                    <th >@lang('models/invoices.fields.lpo')</th>  
                                    <td>{{ $invoice->lpo }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($invoice->type=='service')
                        <table class="table mb-4" border="1">
                            <thead>
                              <tr class="bg-gy">
                                <th>@lang('models/services.fields.number')</th>  
                                <th>@lang('models/services.fields.name')</th>
                                <th>@lang('models/services.fields.model')</th>
                                <th>@lang('models/services.fields.brand')</th>
                                <th>@lang('models/services.fields.amount')</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr >
                                      <td>{{ $service->number }}</td>
                                      <td>{{ $service->name }}</td>
                                      <td>{{ $service->model }}</td>
                                      <td>{{ $service->brand }}</td>
                                      <td>{{ $service->amount }}</td>
                                  </tr>
                            </tbody>
                        </table>
                        @endif
                        <table class="table  mb-4 expandable-table" border="1">
                            <thead>
                                <tr class="bg-gy">
                                    @if ($invoice->type=='rental')
                                        <th>@lang('models/products.fields.start_date')</th>
                                        <th>@lang('models/products.fields.time')</th>
                                        <th>@lang('models/products.fields.end_date')</th> 
                                        <th>@lang('models/products.fields.time')</th> 
                                    @endif
                                    <th>@lang('models/products.fields.name')</th>
                                    <th>@lang('models/products.fields.unit')</th>
                                    @if ($invoice->type!='rental')
                                        <th>@lang('models/products.fields.code')</th>
                                    @endif
                                    @if ($invoice->type=='rental')
                                        <th>@lang('models/products.fields.period')</th>
                                        <th>@lang('models/products.fields.rental')</th>
                                    @endif
                                    <th>@lang('models/products.fields.price')</th>
                                    <th>@lang('models/products.fields.qty')</th>
                                    <th>@lang('models/products.fields.amount')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_qty=0;
                                    $total_amount=0;
                                @endphp
                                @foreach ($products as $product)
                                @php
                                    $total_qty+=$product->qty;
                                    $total_amount+=$product->amount;
                                @endphp
                                    <tr class="expandable-header">
                                        @if ($invoice->type=='rental')
                                            <td>{{ $product->start_date->format('Y-m-d') }}</td>
                                            <td>{{ $product->start_date->format('H:i') }}</td>
                                            <td>{{ $product->end_date->format('Y-m-d') }}</td>
                                            <td>{{ $product->end_date->format('H:i') }}</td>
                                        @endif
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->unit }}</td>
                                        @if ($invoice->type!='rental')
                                            <td>{{ $product->code }}</td>
                                        @endif
                                        @if ($invoice->type=='rental')
                                            <td>{{ $product->period }}</td>
                                            <td>{{ $product->rental }}</td>
                                        @endif                      
                                        <td>{{ $product->price }}</td>          
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->amount }}</td>
                                    </tr>
                                @endforeach

                                <tr class="bg-gy">
                                        @if ($invoice->type=='rental')
                                            <td colspan="8"></td>
                                        @endif
                                        @if ($invoice->type!='rental')
                                            <td colspan="3"></td>
                                        @endif     
                                        <th>Total</th>                      
                                        <td>{{ $total_qty }}</td>
                                        <td>{{ $total_amount }}</td>
                                   
                                    
                                </tr>
                            </tbody>
                        </table>
                        <table class="table mb-4" border="1">
                            <thead>
                              <tr class="bg-gy">
                                <th>@lang('models/invoices.fields.discount')</th>
                                <th>@lang('models/invoices.fields.gross')</th>
                                <th>@lang('models/invoices.fields.vat')</th>
                                <th>@lang('models/invoices.fields.vat_amount')</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr >
                                      <td>{{ $invoice->discount }}</td>
                                      <td>{{ $invoice->gross }}</td>
                                      <td>{{ $invoice->vat }}</td>
                                      <td>{{ $invoice->vat_amount }}</td>
                                  </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="mb-4">
                            <div class="float-left">
                                Lamiae rental
                            </div>
                            <div class="float-right">
                                Client signature
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.k-term ul li{
    font-size:14px;
}
</style>