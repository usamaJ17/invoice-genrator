<h4>Type: </h4>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::radio('type','rental',true,['id' => 'type_1'])!!}
            {!! Form::label('type_1', __('models/invoices.fields.rental')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::radio('type','sales','',['id' => 'type_2'])!!}
            {!! Form::label('type_2', __('models/invoices.fields.sales')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::radio('type','service','',['id' => 'type_3'])!!}
            {!! Form::label('type_3', __('models/invoices.fields.service')) !!}
        </div>
    </div>
</div>
<br>
{{-- basic invoice fields (same for all) --}}
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('date',   __('models/invoices.fields.date')) !!}
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
    {{-- echo Form::select('size', ['L' => 'Large', 'S' => 'Small']); --}}
    @section('css')
    @parent
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @endsection
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('customer', __('models/invoices.fields.name')) !!}
            <div class="input-group">
                {!! Form::select('customer',$data, null , ['class' => $errors->has('customer') ? 'form-control is-invalid' : 'form-control', 'id' => 'customer']) !!}
                @if ($errors->has('customer'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('customer') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    @section('scripts')
    @parent
        <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <script>

            $('#customer').select2({
                theme: 'bootstrap4',
                tags: true
            })
        </script>
    @endsection
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('authorized', __('models/invoices.fields.authorized')) !!}
            {!! Form::text('authorized', null, ['class' => $errors->has('authorized') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('authorized'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('authorized') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('phone', __('models/invoices.fields.phone')) !!}
            {!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('phone'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('trn', __('models/invoices.fields.trn')) !!}
            {!! Form::text('trn', null, ['class' => $errors->has('trn') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('trn'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('trn') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('payment', __('models/invoices.fields.payment')) !!}
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
            {!! Form::label('lpo', __('models/invoices.fields.lpo')) !!}
            {!! Form::text('lpo', null, ['class' => $errors->has('lpo') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('lpo'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('lpo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group ">
            {!! Form::label('reference', __('models/invoices.fields.reference')) !!}
            {!! Form::text('reference', null, ['class' => $errors->has('reference') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('reference'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('reference') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('remarks', __('models/invoices.fields.remarks')) !!}
            {!! Form::text('remarks', null, ['class' => $errors->has('remarks') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('remarks'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('remarks') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('address', __('models/invoices.fields.address')) !!}
            {!! Form::text('address', null, ['class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('address'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>


</div>
{{-- basic invoice fields (same for all) end --}}

{{-- products Services  --}}

<br>
<h3 class="services">Service :</h3>
<div class="row services">
    @include(strtolower(__('models/invoices.plural')).'.service_fields')
</div>
<hr>
{{-- products service  -end --}}

{{-- products fields (few difference-- will be handeled by a jquery script) --}}
<h3>Products :</h3>
<br>
@if (str_contains(url()->current(), '/create'))
    <a class="btn btn-success mb-2" id="add_new_exp_field"><i class="fa fa-plus"></i> Add Product</a>
    <input type="hidden" name="total_row" value=1 id="total_row">
@endif

@if (str_contains(url()->current(), '/create'))
    <div class="row" id="exp_file_row">
        @include(strtolower(__('models/invoices.plural')).'.product_fields')
    </div>
@endif
<hr>
@if (str_contains(url()->current(), '/edit'))
@foreach ($products as $product)
<div class="row" id="exp_file_row">
    @include(strtolower(__('models/invoices.plural')).'.edit_product_fields')
</div>
@endforeach
@endif

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}

{{-- basic invoice fields (same for all) total --}}
<h3>Total :</h3>
<br>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('discount', __('models/invoices.fields.discount')) !!}
            {!! Form::number('discount', null, ['class' => $errors->has('discount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','id'=>'discount' ]) !!}
            @if ($errors->has('discount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('gross', __('models/invoices.fields.gross') ) !!}
            {!! Form::number('gross', null, ['class' => $errors->has('gross') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal']) !!}
            @if ($errors->has('gross'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('gross') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('vat', __('models/invoices.fields.vat') ) !!}
            {!! Form::number('vat', null, ['class' => $errors->has('vat') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal']) !!}
            @if ($errors->has('vat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('vat_amount', __('models/invoices.fields.vat_amount') ) !!}
            {!! Form::number('vat_amount', null, ['class' => $errors->has('vat_amount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal']) !!}
            @if ($errors->has('vat_amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat_amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
{{-- basic invoice fields (same for all) total -end --}}

{{-- submit form (same for all) --}}
<div class="row">
    <div class="col-sm-12">
        <!-- Submit Field -->
        <div class="form-group">
            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-danger btn-flat btn-lg']) !!}
            <a href="{{ route('invoice.index') }}" class="btn btn-outline-danger btn-flat btn-lg text-maroon">@lang('crud.cancel')</a>
        </div>
    </div>
</div>
{{-- submit form (same for all) -end --}}


{{-- scrtipts (clone products row and change fileds based on type ) --}}
@section('scripts')
    @parent
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        var total_amount=0;
    </script>
    {{-- -- exp_doc uplode field name change script-- --}}
       <script type="text/javascript">
       // in edit seting customer field value
        $(document).ready(function() {
            @if (str_contains(url()->current(), '/edit'))
                if(!$("#customer option[value='{{$invoice->customer}}']").length > 0){
                    var o = new Option("{{$invoice->customer}}", "{{$invoice->customer}}");
                    $(o).html("{{$invoice->customer}}");
                    $("#customer").append(o);
                    $('#customer').val("{{$invoice->customer}}"); // Select the option with a value of '1'
                    $('#customer').trigger('change'); // Notify any JS components that the value changed
                }
            @endif
            $('.date').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });
            @if (str_contains(url()->current(), '/create'))
                $('.date').val(null);
            @endif

            // change fileds based on type
            @if(isset($invoice->type))
                var type="{{$invoice->type}}"
                handelFields(type);
            @else
                handelFields('rental');
            @endif
            $('input[type=radio][name=type]').change(function() {
                handelFields(this.value);
            });
            function handelFields(value){
                if (value == 'rental') {
                    $('.sale_field').hide();
                    $('.services').hide();
                    $('.rental_field').show();
                    $.each($('.sale_field').find(':input'), function( key, field ) {
                            field.value=null;
                    });
                    $.each($('.services').find(':input'), function( key, field ) {
                            field.value=null;
                    });
                }
                else if (value == 'sales') {
                    $('.rental_field').hide();
                    $('.services').hide();
                    $('.sale_field').show();
                    $.each($('.rental_field').find(':input'), function( key, field ) {
                            field.value=null;
                    });
                    $("#doc_rental").val("").change();
                    $.each($('.services').find(':input'), function( key, field ) {
                            field.value=null;
                    });
                }
                else if (value == 'service') {
                    $('.rental_field').hide();
                    $('.sale_field').show();
                    $('.services').show();
                    $.each($('.rental_field').find(':input'), function( key, field ) {
                            field.value=null;
                    });
                    $("#doc_rental").val("").change();
                }
            }

            // clone products row
            var totalRow=$('#total_row').val();
            var row=$('#exp_file_row').clone(false);
            $('#add_new_exp_field').click(function() {
                totalRow++;
                $('#total_row').val(totalRow);
                var copy=row.clone(false);

                var fields=copy.find(':input');
                $.each( fields, function( key, field ) {
                    field.name=field.name.replace(/\d+/,totalRow);
                });

                copy.find('#exp_del').click(function() {
                    copy.remove();
                });
                $('#add_new_exp_field').after(copy);
                //auto amount calculate
                $("input[name='price_"+totalRow+"']").add("input[name='qty_"+totalRow+"']").add("input[name='period_"+totalRow+"']").on('change', function(){
                    var period=$("input[name='period_"+totalRow+"']").val();
                    if(period != 0 && period !='0'){
                        $("input[name='amount_"+totalRow+"']").val($("input[name='price_"+totalRow+"']").val() * $("input[name='qty_"+totalRow+"']").val() * period);
                    }
                    else{
                        $("input[name='amount_"+totalRow+"']").val($("input[name='price_"+totalRow+"']").val() * $("input[name='qty_"+totalRow+"']").val());
                    }
                    update_amount_field();
                });

                //adjust new fields ased on type
                var invoice_type=$('input[type=radio][name=type]:checked').val();
                handelFields(invoice_type);
                //add date picker to coppied row
                copy.find('.date').daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });
                copy.find('.date').val(null);
            });
            function update_amount_field(product_start=1,product_end=totalRow){
                var sum=0;
                for (let product_start = 1; product_start <= product_end; product_start++) {
                    if($("input[name='amount_"+product_start+"']").val()){
                        sum+=parseFloat($("input[name='amount_"+product_start+"']").val());
                    }
                }
                $("input[name=total]").val(sum);
                var discount=$("input[name=discount]").val();
                var gross=$("input[name=gross]");
                gross.val(sum-discount);
                var vat=Math.round(gross.val()* 0.05);
                $("input[name=vat]").val(vat);
                vat_amount=$("input[name=vat_amount]").val( Number(gross.val()) + Number(vat));
                return sum;
            }
            $('#discount').on('keyup', function(){
                @if (str_contains(url()->current(), '/edit'))
                    var prod=@json($products);
                    var start,end=0;
                    if (prod.length !== 0){
                        end=prod[0]['product_id'];
                        start=prod.pop()['product_id'];
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
