{{-- basic Purchases fields (same for all) --}}
@section('css')
@parent
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.min.css')}}">
@endsection
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('date',   __('models/purchases.fields.date')) !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                    {!! Form::text('date', null, ['class' => $errors->has('date') ? 'form-control  date is-invalid' : 'form-control  date', 'id' => 'date']) !!}

                @if ($errors->has('date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    @if (str_contains(url()->current(), '/create'))
        <div class="col-sm-1">
            <div class="form-group ">
                {!! Form::label('no', __('models/purchases.fields.no')) !!}
                {!! Form::text('no', $nextId, ['class' => $errors->has('no') ? 'form-control is-invalid' : 'form-control', 'disabled']) !!}
                @if ($errors->has('no'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif    
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('sup_name', __('models/purchases.fields.sup_name')) !!}
            {!! Form::text('sup_name', null, ['class' => $errors->has('sup_name') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('sup_name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sup_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('phone', __('models/purchases.fields.phone')) !!}
            {!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control' ,'id'=>'customer_phone']) !!}
            @if ($errors->has('phone'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('sup_invoice', __('models/purchases.fields.sup_invoice')) !!}
            {!! Form::text('sup_invoice', null, ['class' => $errors->has('sup_invoice') ? 'form-control is-invalid' : 'form-control','id'=>'customer_sup_invoice']) !!}
            @if ($errors->has('sup_invoice'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sup_invoice') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group ">
            {!! Form::label('payment', __('models/purchases.fields.payment')) !!}
            <div class="input-group">
                {!! Form::select('payment', config('enum.payment_type'),null, ['class' => $errors->has('payment') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('payment'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('payment') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('sup_trn', __('models/purchases.fields.sup_trn')) !!}
            {!! Form::text('sup_trn', null, ['class' => $errors->has('sup_trn') ? 'form-control is-invalid' : 'form-control','id'=>'customer_sup_trn']) !!}
            @if ($errors->has('sup_trn'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sup_trn') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('bank', __('models/purchases.fields.bank')) !!}
            {!! Form::text('bank', null, ['class' => $errors->has('bank') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('bank'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bank') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('remarks', __('models/purchases.fields.remarks')) !!}
            {!! Form::text('remarks', null, ['class' => $errors->has('remarks') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('remarks'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('remarks') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}
<h3>Parts :</h3>
<br>
    <a class="btn btn-success mb-2" id="add_new_exp_field"><i class="fa fa-plus"></i> Add Parts</a>
    <input type="hidden" name="total_row" value=1 id="total_row">

@if (str_contains(url()->current(), '/create'))
    <div class="row" id="exp_file_row">
        @include(strtolower(__('models/purchases.plural')).'.part_fields')
    </div>
@endif
<hr>
@if (str_contains(url()->current(), '/edit'))
@foreach ($parts as $part)
<div class="row" id="exp_file_row">
    @include(strtolower(__('models/purchases.plural')).'.edit_part_fields')
</div>
@endforeach
@endif

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}

{{-- basic purchase fields (same for all) total --}}
<h3>Total :</h3>
<br>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('total', __('models/purchases.fields.total')) !!}
            {!! Form::number('total', null, ['class' => $errors->has('total') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any",'id'=>'total' ]) !!}
            @if ($errors->has('total'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('total') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('discount', __('models/purchases.fields.discount')) !!}
            {!! Form::number('discount', null, ['class' => $errors->has('discount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any",'id'=>'discount' ]) !!}
            @if ($errors->has('discount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('gross', __('models/purchases.fields.gross') ) !!}
            {!! Form::number('gross', null, ['class' => $errors->has('gross') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any"]) !!}
            @if ($errors->has('gross'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('gross') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('vat', __('models/purchases.fields.vat') ) !!}
            {!! Form::number('vat', null, ['class' => $errors->has('vat') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal' ,'step'=>"any"]) !!}
            @if ($errors->has('vat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('vat_amount', __('models/purchases.fields.vat_amount') ) !!}
            {!! Form::number('vat_amount', null, ['class' => $errors->has('vat_amount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any"]) !!}
            @if ($errors->has('vat_amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat_amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
{{-- basic purchase fields (same for all) total -end --}}
{{-- submit form (same for all) --}}
<div class="row">
    <div class="col-sm-12">
        <!-- Submit Field -->
        <div class="form-group">
            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-danger btn-flat btn-lg']) !!}
            <a href="{{ route('purchase.index') }}" class="btn btn-outline-danger btn-flat btn-lg text-maroon">@lang('crud.cancel')</a>
        </div>
    </div>
</div>
{{-- submit form (same for all) -end --}}


{{-- scrtipts (clone products row and change fileds based on type ) --}}
@section('scripts')
    @parent
    <script src="{{ asset('plugins\flatpickr\flatpickr.min.js') }}"></script>
    <script type="text/javascript">
        var total_amount=0;
    </script>
    {{-- -- exp_doc uplode field name change script-- --}}
    <script type="text/javascript">
       // in edit seting customer field value
        $(document).ready(function() {
            @if (str_contains(url()->current(), '/edit'))
                if(!$("#customer option[value='{{$purchase->customer}}']").length > 0){
                    var o = new Option("{{$purchase->customer}}", "{{$purchase->customer}}");
                    $(o).html("{{$purchase->customer}}");
                    $("#customer").append(o);
                    $('#customer').val("{{$purchase->customer}}"); // Select the option with a value of '1'
                    $('#customer').trigger('change'); // Notify any JS components that the value changed
                }
            @endif
            $('.date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
            @if (str_contains(url()->current(), '/create'))
                $('.date').val(null);
            @endif

            // change fileds based on type

            // clone products row
            var totalRow=$('#total_row').val();
            @if (str_contains(url()->current(), '/edit'))
                totalRow--;
            @endif
            var row=$('#exp_file_row').clone(false);
            $('#add_new_exp_field').click(function() {
                totalRow++;
                $('#total_row').val(totalRow);
                var copy=row.clone(false);

                var fields=copy.find(':input');
                $.each( fields, function( key, field ) {
                    field.name=field.name.replace(/\d+/,totalRow);
                    @if (str_contains(url()->current(), '/edit'))
                        field.name=field.name.replace('_','_new_');
                        field.value=null;
                    @endif
                });

                //auto amount calculate
                copy.find("input[name*='price']").add(copy.find("input[name*='qty']")).on('change', function(){
                    var period=copy.find("input[name*='period']").val();
                    copy.find("input[name*='amount']").val(copy.find("input[name*='price']").val() * copy.find("input[name*='qty']").val());

                    @if (str_contains(url()->current(), '/edit'))
                        $( "#discount" ).trigger( "keyup" );
                    @else
                        update_amount_field();
                    @endif
                    
                });
                copy.find('#exp_del').click(function() {
                    copy.remove();
                    update_amount_field();
                });

                //add date picker to coppied row
                copy.find('.date').flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                });
                @if (str_contains(url()->current(), '/create'))
                    copy.find('.date').val(null);
                @endif

                $('#add_new_exp_field').after(copy);
            });
            function update_amount_field(product_start=1,product_end=totalRow){
                var sum=0;
                while(product_start <= product_end){
                    if($("input[name='amount_"+product_start+"']").val()){
                        sum+=parseFloat($("input[name='amount_"+product_start+"']").val());
                    }
                    product_start++;
                }
                // add amount of new fields in total
                @if (str_contains(url()->current(), '/edit'))
                    product_start =1
                    while(product_start <= totalRow){
                        if($("input[name='amount_new_"+product_start+"']").val()){
                            sum+=parseFloat($("input[name='amount_new_"+product_start+"']").val());
                        }
                        product_start++;
                    }
                @endif
                $("input[name=total]").val(sum);
                var discount=$("input[name=discount]").val();
                var gross=$("input[name=gross]");
                gross.val(sum-discount);
                var vat=(gross.val()* 0.05).toFixed(3);
                $("input[name=vat]").val(vat);
                vat_amount=$("input[name=vat_amount]").val( Number(gross.val()) + Number(vat));
                return sum;
            }
            $('#discount').on('keyup change', function(){
                @if (str_contains(url()->current(), '/edit'))
                    var prod=@json($parts);
                    var start,end=0;
                    if (prod.length !== 0){
                        start=prod[0]['part_id'];
                        end=prod.pop()['part_id'];
                        update_amount_field(start,end);
                    }
                @else
                    update_amount_field();
                @endif

            });
        });
    </script>
        {{-- -- exp_doc uplode field name change script end-- --}}
@endsection
{{-- scrtipts (clone products row and change fileds based on type) -end --}}
