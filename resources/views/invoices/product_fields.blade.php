<div class="col-sm-3 rental_field">
    <div class="form-group">
        {!! Form::label('start_date',   __('models/products.fields.start_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('start_date', null, ['class' => $errors->has('start_date') ? 'form-control  date is-invalid' : 'form-control  date', 'id' => 'date']) !!}
            @else
                {!! Form::text('start_date_1', null, ['class' => $errors->has('start_date') ? 'form-control  date is-invalid' : 'form-control  date', 'id' => 'date']) !!}
            @endif

            @if ($errors->has('start_date'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3 rental_field">
    <div class="form-group">
        {!! Form::label('end_date',  __('models/products.fields.end_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('end_date', null, ['class' => $errors->has('end_date') ? 'form-control is-invalid date' : 'form-control date', 'id' => 'date']) !!}
            @else
                {!! Form::text('end_date_1', null, ['class' => $errors->has('end_date') ? 'form-control is-invalid date' : 'form-control date', 'id' => 'date']) !!}
            @endif

            @if ($errors->has('end_date'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('name',__('models/products.fields.name')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}
            @else
                {!! Form::text('name_1', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}
            @endif
          
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3 sale_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('code',__('models/products.fields.code')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('code', null, ['class' => $errors->has('code') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_code"]) !!}
            @else
                {!! Form::text('code_1', null, ['class' => $errors->has('code') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_code"]) !!}
            @endif
          
            @if ($errors->has('code'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3 rental_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('rental',__('models/products.fields.rental')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('rental', null, ['class' => $errors->has('rental') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_rental"]) !!}
            @else
                {!! Form::text('rental_1', null, ['class' => $errors->has('rental') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_rental"]) !!}
            @endif
          
            @if ($errors->has('rental'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('rental') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3 rental_field">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('period',__('models/products.fields.period')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('period', null, ['class' => $errors->has('period') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_period"]) !!}
            @else
                {!! Form::text('period_1', null, ['class' => $errors->has('period') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_period"]) !!}
            @endif
          
            @if ($errors->has('period'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('period') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('unit',__('models/products.fields.unit')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::text('unit', null, ['class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_unit"]) !!}
            @else
                {!! Form::text('unit_1', null, ['class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_unit"]) !!}
            @endif
          
            @if ($errors->has('unit'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('unit') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('price',__('models/products.fields.price')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::number('price', null, ['class' => $errors->has('price') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_price"]) !!}
            @else
                {!! Form::number('price_1', null, ['class' => $errors->has('price') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_price"]) !!}
            @endif
          
            @if ($errors->has('price'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('qty',__('models/products.fields.qty')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::number('qty', null, ['class' => $errors->has('qty') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_qty"]) !!}
            @else
                {!! Form::number('qty_1', null, ['class' => $errors->has('qty') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_qty"]) !!}
            @endif
          
            @if ($errors->has('qty'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('qty') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('amount',__('models/products.fields.amount')) !!}
        <div class="input-group">
            @if (str_contains(url()->current(), '/edit'))
                {!! Form::number('amount', null, ['class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control' , 'id'=>"doc_amount"]) !!}
            @else
                {!! Form::number('amount_1', null, ['class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control','id'=>"doc_amount"]) !!}
            @endif
          
            @if ($errors->has('amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

@if (str_contains(url()->current(), '/create'))
<span id='exp_del'><a class="btn btn-danger mt-4"><i class="fa fa-trash"></i> Delete Products</a></span>
@endif
@section('scripts')
    @parent
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.date').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
            $('.date').val(null);
            // $('.num_type').on('input', function() {
            //     $('#mirror').text($('#alice').val());
            // });
            $('#exp_del').click(function(){
                $('#exp_file_row').remove();
            })
        });
    </script>
@endsection



