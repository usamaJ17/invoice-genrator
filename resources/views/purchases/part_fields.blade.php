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
                {!! Form::number('price_1', null, ['class' => $errors->has('price') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_price",'step'=>"any"]) !!}

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
                {!! Form::number('amount_1', null, [ 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control','id'=>"proc_amount", "readonly",'step'=>"any"]) !!}
            @if ($errors->has('amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

@if (str_contains(url()->current(), '/create'))

<div class="col-sm-2">
    <!-- File Field -->
    <div class="form-group">
        {!! Form::label('button','asd',['class'=>'invisible']) !!}
        <div class="input-group">
            <span id='exp_del' style="position: absolute;top: -15px;line-height:2;"><a class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></span>
                {{-- {!! Form::number('amount_1', null, [ 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control','id'=>"proc_amount", "readonly",'step'=>"any"]) !!} --}}
        </div>
    </div>
</div>
@endif

@push('child-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("input[name='price_1']").add("input[name='qty_1']").add("input[name='period_1']").on('change', function(){
                $("input[name='amount_1']").val($("input[name='price_1']").val() * $("input[name='qty_1']").val());
                $( "#discount" ).trigger( "keyup" );
            });
            var row=$('#exp_file_row');
            $('#exp_del').click(function(){
                row.remove();
                $( "#discount" ).trigger( "keyup" );
            })
        });
    </script>
@endpush




<style>
    label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 500 !important;
    font-size: 13px;
    margin-bottom:2px;
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
    .k-btn-sub{
        margin-top:22px;
    }
    .text-sm {
    font-size: .775rem!important;
}
.select2-container--bootstrap4 .select2-selection--single {
    height: calc(2.05rem + 1px)!important;
}
    </style>
