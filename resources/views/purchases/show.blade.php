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
                        <h2 class="text-center text-weight-bold pb-1" style="text-transform: uppercase;">Purchase</h2>
                        <br>
                        <table class="table mb-4" border="2">
                            <tbody>
                                <tr>
                                    <th>@lang('models/purchases.fields.sup_name')</th>
                                    <td>{{ $purchase->sup_name }}</td>
                                    <th>@lang('models/purchases.fields.date')</th>
                                    <td>{{ ($purchase->date) ? $purchase->date->format('Y-m-d H:i') : "" }}</td>
                                </tr>
                                <tr >
                                    <th>@lang('models/purchases.fields.phone')</th>
                                    <td>{{ $purchase->phone }}</td>
                                    <th>@lang('models/purchases.fields.sup_invoice')</th>
                                    <td>{{ $purchase->sup_invoice }}</td>
                                </tr>
                                <tr >
                                    <th>@lang('models/purchases.fields.sup_trn')</th>
                                    <td>{{ $purchase->sup_trn }}</td>                                    
                                    <th>@lang('models/purchases.fields.payment')</th>
                                    <td>{{ $purchase->payment }}</td>
                                </tr>
                                <tr >
                                    <th>@lang('models/purchases.fields.remarks')</th>
                                    <td>{{ $purchase->remarks }}</td>                                    
                                    <th>@lang('models/purchases.fields.bank')</th>
                                    <td>{{ $purchase->bank }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table  mb-4 expandable-table" border="1">
                            <thead>
                                <tr class="bg-gy">
                                    <th>@lang('models/parts.fields.name')</th>
                                    <th>@lang('models/parts.fields.unit')</th>
                                    <th>@lang('models/parts.fields.qty')</th>
                                    <th>@lang('models/parts.fields.price')</th>
                                    <th>@lang('models/parts.fields.amount')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_qty=0;
                                    $total_amount=0;
                                @endphp
                                @foreach ($parts as $part)
                                @php
                                    $total_qty+=$part->qty;
                                    $total_amount+=$part->amount;
                                @endphp
                                    <tr class="expandable-header">
                                        <td>{{ $part->name }}</td>
                                        <td>{{ $part->unit }}</td>           
                                        <td>{{ $part->qty }}</td>        
                                        <td>{{ $part->price }}</td>          
                                        <td>{{ $part->amount }}</td>
                                    </tr>
                                @endforeach

                                <tr class="bg-gy">
                                        <td colspan="1"></td>   
                                        <th>Total</th>                      
                                        <td>{{ $total_qty }}</td>
                                        <td></td>
                                        <td>{{ $total_amount }}</td>
                                   
                                    
                                </tr>
                            </tbody>
                        </table>
                        <table class="table mb-4" border="1">
                            <thead>
                              <tr class="bg-gy">
                                <th>@lang('models/purchases.fields.total')</th>
                                <th>@lang('models/purchases.fields.discount')</th>
                                <th>@lang('models/purchases.fields.gross')</th>
                                <th>@lang('models/purchases.fields.vat')</th>
                                <th>@lang('models/purchases.fields.vat_amount')</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr>
                                      <td>{{ $purchase->total }}</td>
                                      <td>{{ $purchase->discount }}</td>
                                      <td>{{ $purchase->gross }}</td>
                                      <td>{{ $purchase->vat }}</td>
                                      <td>{{ $purchase->vat_amount }}</td>
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