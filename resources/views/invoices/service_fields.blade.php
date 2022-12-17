@if (str_contains(url()->current(), '/edit') && isset($service->service_id))
<input type="hidden" name='service_id' value={{$service->service_id}}>
@endif
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('number',__('models/services.fields.number')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit') && isset($service->number))
                {!! Form::text('number', $service->number, ['class' => $errors->has('number') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_number"]) !!}
            @else
                {!! Form::text('number', null, ['class' => $errors->has('number') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_number"]) !!}
            @endif
          
            @if ($errors->has('number'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('number') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('name',__('models/services.fields.name')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit') && isset($service->name))
                {!! Form::text('name', $service->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}
            @else
                {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}
            @endif
          
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('model',__('models/services.fields.model')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit') && isset($service->model))
                {!! Form::text('model', $service->model, ['class' => $errors->has('model') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_model"]) !!}
            @else
                {!! Form::text('model', null, ['class' => $errors->has('model') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_model"]) !!}
            @endif
          
            @if ($errors->has('model'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('model') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('brand',__('models/services.fields.brand')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit') && isset($service->brand))
                {!! Form::text('brand', $service->brand, ['class' => $errors->has('brand') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_brand"]) !!}
            @else
                {!! Form::text('brand', null, ['class' => $errors->has('brand') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_brand"]) !!}
            @endif
          
            @if ($errors->has('brand'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('brand') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('amount',__('models/services.fields.amount')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit') && isset($service->amount))
                {!! Form::text('amount', $service->amount, ['class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_amount"]) !!}
            @else
                {!! Form::text('amount', null, ['class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_amount"]) !!}
            @endif
          
            @if ($errors->has('amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
