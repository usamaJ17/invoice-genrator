<div class="col-sm-2 rental_field">
    <div class="form-group">
        {!! Form::label('start_date',   __('models/products.fields.start_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
                {!! Form::text('start_date_1', null, ['class' => $errors->has('start_date') ? 'form-control  date is-invalid' : 'form-control  date', 'id' => 'date']) !!}

            @if ($errors->has('start_date'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-2 rental_field">
    <div class="form-group">
        {!! Form::label('end_date',  __('models/products.fields.end_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
                {!! Form::text('end_date_1', null, ['class' => $errors->has('end_date') ? 'form-control is-invalid date' : 'form-control date', 'id' => 'date']) !!}

            @if ($errors->has('end_date'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-2">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('name',__('models/products.fields.name')) !!}
        <div class="input-group">
                {!! Form::text('name_1', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-2 sale_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('code',__('models/products.fields.code')) !!}
        <div class="input-group">
                {!! Form::text('code_1', null, ['class' => $errors->has('code') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_code"]) !!}

            @if ($errors->has('code'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1 rental_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('rental',__('models/products.fields.rental')) !!}
        <div class="input-group">
            {!! Form::select('rental_1', config('enum.rental_unit'),null, ['class' => $errors->has('rental') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_rental"]) !!}
            @if ($errors->has('rental'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('rental') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('unit',__('models/products.fields.unit')) !!}
        <div class="input-group">
            {!! Form::select('unit_1', config('enum.unit'),null,['class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_unit"]) !!}

            @if ($errors->has('unit'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('unit') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1 rental_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('period',__('models/products.fields.period')) !!}
        <div class="input-group">
                {!! Form::number('period_1', null, ['class' => $errors->has('period') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_period"]) !!}

            @if ($errors->has('period'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('period') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('qty',__('models/products.fields.qty')) !!}
        <div class="input-group">
                {!! Form::number('qty_1', null, ['class' => $errors->has('qty') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_qty"]) !!}

            @if ($errors->has('qty'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('qty') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('price',__('models/products.fields.price')) !!}
        <div class="input-group">
                {!! Form::number('price_1', null, ['class' => $errors->has('price') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_price"]) !!}

            @if ($errors->has('price'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-1">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('amount',__('models/products.fields.amount')) !!}
        <div class="input-group">
                {!! Form::number('amount_1', null, [ 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control','id'=>"proc_amount", "readonly"]) !!}
            @if ($errors->has('amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

@if (str_contains(url()->current(), '/create'))
    <span id='exp_del'><a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete Products</a></span>
@endif

@push('child-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("input[name='price_1']").add("input[name='qty_1']").add("input[name='period_1']").on('change', function(){
                var period=$("input[name='period_1']").val();
                if(period != 0 && period !='0'){
                    $("input[name='amount_1']").val($("input[name='price_1']").val() * $("input[name='qty_1']").val() * period);
                }
                else{
                    $("input[name='amount_1']").val($("input[name='price_1']").val() * $("input[name='qty_1']").val());
                }
                $( "#discount" ).trigger( "keyup" );
                update_amount_field();
            });
            var row=$('#exp_file_row');
            $('#exp_del').click(function(){
                row.remove();
            })
        });
    </script>
@endpush



