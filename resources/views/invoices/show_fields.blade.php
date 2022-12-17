<div class="row">
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.created_at')</b> <br><a class="text-left">{{ $invoice->created_at }}</a>
        </li>
    </div>
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.no')</b> <br><a class="text-left">{{ $invoice->invoice_no }}</a>
        </li>
    </div>
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.type')</b> <br><a class="text-left">{{ $invoice->type }}</a>
        </li>
    </div>
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.name')</b> <br><a class="text-left">{{ $invoice->user->name}}</a>
        </li>
    </div> 
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.authorized')</b> <br><a class="text-left">{{ $invoice->authorized}}</a>
        </li>
    </div>  
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.phone')</b> <br><a class="text-left">{{ $invoice->phone}}</a>
        </li>
    </div>   
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.lpo')</b> <br><a class="text-left">{{ $invoice->lpo}}</a>
        </li>
    </div>   
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.payment')</b> <br><a class="text-left">{{ $invoice->payment}}</a>
        </li>
    </div>    
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.trn')</b> <br><a class="text-left">{{ $invoice->trn}}</a>
        </li>
    </div>      
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.address')</b> <br><a class="text-left">{{ $invoice->address}}</a>
        </li>
    </div>  
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.remarks')</b> <br><a class="text-left">{{ $invoice->remarks}}</a>
        </li>
    </div>   
</div>

<h3>Products</h3>
@foreach ($products as $product)
<br>
    <div class="row">
        @if ($invoice->type=='rental')
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.start_date')</b> <br><a class="text-left">{{ $product->start_date}}</a>
            </li>
        </div>
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.end_date')</b> <br><a class="text-left">{{ $product->end_date}}</a>
            </li>
        </div>
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.period')</b> <br><a class="text-left">{{ $product->period}}</a>
            </li>
        </div>
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.rental')</b> <br><a class="text-left">{{ $product->rental}}</a>
            </li>
        </div>
        @endif
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.name')</b> <br><a class="text-left">{{ $product->name }}</a>
            </li>
        </div>
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.unit')</b> <br><a class="text-left">{{ $product->unit}}</a>
            </li>
        </div> 
        @if ($invoice->type!='rental')
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.code')</b> <br><a class="text-left">{{ $product->code}}</a>
            </li>
        </div>  
        @endif
        @if ($invoice->type=='rental')
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.period')</b> <br><a class="text-left">{{ $product->period}}</a>
            </li>
        </div>
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.rental')</b> <br><a class="text-left">{{ $product->rental}}</a>
            </li>
        </div>
        @endif
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.price')</b> <br><a class="text-left">{{ $product->price}}</a>
            </li>
        </div>   
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.qty')</b> <br><a class="text-left">{{ $product->qty}}</a>
            </li>
        </div>   
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/products.fields.amount')</b> <br><a class="text-left">{{ $product->amount}}</a>
            </li>
        </div>    
    </div>
@endforeach
@if ($invoice->type=='service')
<h3>Service</h3>
<div class="row">
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/services.fields.number')</b> <br><a class="text-left">{{ $service->number}}</a>
            </li>
        </div> 
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/services.fields.name')</b> <br><a class="text-left">{{ $service->name}}</a>
            </li>
        </div> 
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/services.fields.model')</b> <br><a class="text-left">{{ $service->model}}</a>
            </li>
        </div> 
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/services.fields.brand')</b> <br><a class="text-left">{{ $service->brand}}</a>
            </li>
        </div> 
        <div class="col-md-3 col-sm-6">
            <li class="callout callout-danger list-group-item mb-3 shadow">
                <b>@lang('models/services.fields.amount')</b> <br><a class="text-left">{{ $service->amount}}</a>
            </li>
        </div> 
    </div>
@endif
<h3>Total</h3>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.total')</b> <br><a class="text-left">{{ $invoice->total}}</a>
        </li>
    </div> 
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.discount')</b> <br><a class="text-left">{{ $invoice->discount}}</a>
        </li>
    </div> 
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.gross')</b> <br><a class="text-left">{{ $invoice->gross}}</a>
        </li>
    </div> 
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.vat')</b> <br><a class="text-left">{{ $invoice->vat}}</a>
        </li>
    </div> 
    <div class="col-md-3 col-sm-6">
        <li class="callout callout-danger list-group-item mb-3 shadow">
            <b>@lang('models/invoices.fields.vat_amount')</b> <br><a class="text-left">{{ $invoice->vat_amount}}</a>
        </li>
    </div> 
</div>

