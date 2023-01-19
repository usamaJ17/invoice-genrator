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
                    <div class="invoice p-3 mb-3" id="withoutlogo1">
                        <div class="row no-print">
                            <div class="col-12">
                              <button type="button" class="btn btn-default float-right" onclick="printWithoutlogo()"><i class="fas fa-print"></i> Print Invoice</button>
                              <button type="button" class="btn btn-default float-right" onclick="printWithlogo()"><i class="fas fa-print"></i> Print Invoice With Logo's</button>
                            </div>
                          </div>
                        <div class="row" style="width:100%;height:120px;">
                            <div class="col-md-12" id="header">
                                    <img src="{{url('/uploads/invoice_header.jpg')}}" width="100%" />
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-weight-bold pb-1" style="margin-top:15px;text-transform: uppercase;">Tax @lang('models/invoices.singular')
                        <span class="k-code-list">(<span>
                        {{ $invoice->trn }}
                            <!-- TRN: 100238651200003 -->
                        </span>)</span></h5>
                        <div class="row justify-content-between">
                            <div class="col-md-5">
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <th class="k-top-th">@lang('models/invoices.fields.name') :</th>
                                            <td class="k-bot-b">{{ $invoice->customer }}</td>
                                        </tr>
                                        <tr >
                                            <th class="k-top-th">@lang('models/invoices.fields.authorized') :</th>
                                            <td class="k-bot-b">{{ $invoice->authorized }}</td>
                                        </tr>
                                        <tr >
                                            <th class="k-top-th">@lang('models/invoices.fields.phone') :</th>
                                            <td class="k-bot-b">{{ $invoice->phone }}</td>
                                        </tr>
                                        <tr >
                                            <th class="k-top-th">@lang('models/invoices.fields.trn') :</th>
                                            <td class="k-bot-b">{{ $invoice->trn }}</td>
                                        </tr>
                                        <tr >
                                            <th class="k-top-th">@lang('models/invoices.fields.address') :</th>
                                            <td class="k-bot-b">{{ $invoice->address }}</td>
                                        </tr>
                                        <tr >
                                            <th class="k-top-th">Remarks :</th>
                                            <td class="k-bot-b">{{ $invoice->remarks }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table mb-4">
                                    <tbody>
                                        <tr >
                                            <th>Invoice @lang('models/invoices.fields.date')</th>
                                            <td>{{ $invoice->date }}</td>
                                        </tr>
                                        <tr >
                                            <th>Manual Invoice</th>
                                            <td>{{ $invoice->manual }}</td>
                                        </tr>
                                        <tr >
                                            <th>@lang('models/invoices.fields.no')</th>
                                            <td>{{ $invoice->invoice_number }}</td>
                                        </tr>
                                        <tr >
                                            <th>@lang('models/invoices.fields.reference')</th>
                                            <td>{{ $invoice->reference }}</td>
                                        </tr>
                                        <tr >
                                            <th>@lang('models/invoices.fields.payment')</th>
                                            <td>{{ $invoice->payment }}</td>
                                        </tr>
                                        <tr >
                                            <th >@lang('models/invoices.fields.lpo')</th>
                                            <td>{{ $invoice->lpo }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        @if ($invoice->type=='service')
                        <table class="table mb-4" border="1">
                            <thead>
                              <tr class="k-bg-gy">
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
                                <tr class="k-bg-gy">
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

                                <tr class="k-bg-gy">
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
                        <table class="table1 mb-4" style="width:50% !important;float:left;">
                        <tr>
                            <td>
                            <div class="form-group "></div>
                            </td>
                        </tr>
                        </table>
                        <table class="table mb-4" border="1" style="width:40% !important;    margin: auto;right: 0;margin-right: 0;">
                            <thead>
                              <tr class="k-bg-gy">
                                <th>@lang('models/invoices.fields.discount')</th>
                                <th>@lang('models/invoices.fields.gross')</th>
                                <th>@lang('models/invoices.fields.vat')</th>
                                <th>
                                    <!-- @lang('models/invoices.fields.vat_amount') -->
                                T-VAT
                                </th>
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
                        <div class="k-signa">
                            <div class="float-left">
                            AL Lamaie Rental
                            </div>
                            <div class="float-right">
                                Client Signature
                            </div>
                        </div>
                    </div>
                    <div class="row" id="footer">
                        <div class="col-md-12">
                            <img src="{{url('/uploads/invoice_footer.jpg')}}" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function printWithlogo() {
        console.log("sss");
        document.getElementById('header').style.display = 'block';
        document.getElementById('footer').style.display = 'block';
        window.print();
    }
    function printWithoutlogo() {
        document.getElementById('header').style.display = 'none';
        document.getElementById('footer').style.display = 'none';
        window.print();
    }
</script>
<style>
    .k-bg-gy{
        background-color:#f1f0f0 !important;
    }
    .k-bot-b{
        border-bottom: 1px solid #888;
    }
    th{
        font-weight:600;
        font-size: 12px !important;
    }
    td{
        font-size: 12px !important;
    }
    .k-top-th{
        text-transform: capitalize;
        font-weight: 600;
        font-size: 12px !important;
        width:32%;
    }
.k-term ul li{
    font-size:14px;
}
.k-code-list{
    font-size:12px;
    font-weight:400 !important;
}
.k-signa{
    margin-top: 55px;
    padding-bottom: 5px;
}
table > thead > tr > th {
    padding: 6px 10px !important;
    font-weight: 500 !important;
    font-size: 12px !important;
}
.table td, .table th {
    padding: 0.002rem 0.6rem;
    vertical-align: middle;
    font-size: 12px !important;
}
</style>
