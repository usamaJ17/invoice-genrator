<!-- <h4>Type: </h4>
<br> -->

<div class="row">
    <div class="col-sm-2">
        <div class="form-group k-checked mb-0">
            {!! Form::radio('type','rental',true,['id' => 'type_1'])!!}
            {!! Form::label('type_1', __('models/invoices.fields.rental')) !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group k-checked mb-0">
            {!! Form::radio('type','sales','',['id' => 'type_2'])!!}
            {!! Form::label('type_2', __('models/invoices.fields.sales')) !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group k-checked mb-0">
            {!! Form::radio('type','service','',['id' => 'type_3'])!!}
            {!! Form::label('type_3', __('models/invoices.fields.service')) !!}
        </div>
    </div>
</div>
<hr>
{{-- basic invoice fields (same for all) --}}
@section('css')
@parent
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.min.css')}}">
@endsection
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
    @if (str_contains(url()->current(), '/create'))
        <div class="col-sm-1">
            <div class="form-group ">
                {!! Form::label('no', __('models/invoices.fields.no')) !!}
                {!! Form::text('no', $nextId, ['class' => $errors->has('no') ? 'form-control is-invalid' : 'form-control', 'disabled']) !!}
                @if ($errors->has('no'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('customer', __('models/invoices.fields.name')) !!}
            <div class="input-group">
                {!! Form::select('customer',$name, null , ['class' => $errors->has('customer') ? 'form-control is-invalid' : 'form-control', 'id' => 'customer']) !!}
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
        <script type="text/javascript">

            $('#customer').select2({
                theme: 'bootstrap4',
                tags: true
            })
            var customer_data = @json($data);
            $('#customer').on('change',function(){
                $('#customer_phone').val(customer_data[this.value][2]);
                $('#customer_trn').val(customer_data[this.value][1]);
                $('#customer_address').val(customer_data[this.value][0]);

            })
        </script>
    @endsection
    <div class="col-sm-2">
        <div class="form-group ">
            {!! Form::label('manual', __('models/invoices.fields.manual')) !!}
            {!! Form::text('manual', null, ['class' => $errors->has('manual') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('manual'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('manual') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-1">
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
            {!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control' ,'id'=>'customer_phone']) !!}
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
            {!! Form::text('trn', null, ['class' => $errors->has('trn') ? 'form-control is-invalid' : 'form-control','id'=>'customer_trn']) !!}
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
    <div class="col-sm-2">
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
    <div class="col-sm-3">
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
            {!! Form::text('address', null, ['class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control','id'=>'customer_address']) !!}
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

<!-- <br>
<h3 class="services">Service :</h3> -->
<div class="row services">
    @include(strtolower(__('models/invoices.plural')).'.service_fields')
</div>
<hr>
{{-- products service  -end --}}

{{-- products fields (few difference-- will be handeled by a jquery script) --}}
<!-- <h3>Products :</h3>
<br> -->
    <a class="btn btn-success mb-2" id="add_new_exp_field" style="line-height:2;"><i class="fa fa-plus"></i></a>
    <input type="hidden" name="total_row" value=1 id="total_row">


@if (str_contains(url()->current(), '/create'))
    <div class="row" id="exp_file_row">
            @include(strtolower(__('models/invoices.plural')).'.product_fields')

    </div>
@endif

<style>
    label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600 !important;
}
.accent-maroon .btn-link:hover, .accent-maroon a:not(.dropdown-item):hover {
    color: #efefef;
}
    </style>
<hr>
@if (str_contains(url()->current(), '/edit'))
@foreach ($products as $product)
<div class="row" id="exp_file_row">
    @include(strtolower(__('models/invoices.plural')).'.edit_product_fields')
</div>
@endforeach
@endif

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}

<div class="row">
{{-- basic invoice fields (same for all) total --}}
<!-- <h3>Total :</h3>
<br> -->
    <div class="col-sm-1">
        <div class="form-group ">
            {!! Form::label('discount', __('models/invoices.fields.discount')) !!}
            {!! Form::number('discount', null, ['class' => $errors->has('discount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any",'id'=>'discount' ]) !!}
            @if ($errors->has('discount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group ">
            {!! Form::label('gross', __('models/invoices.fields.gross') ) !!}
            {!! Form::number('gross', null, ['class' => $errors->has('gross') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any"]) !!}
            @if ($errors->has('gross'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('gross') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group ">
            {!! Form::label('vat', __('models/invoices.fields.vat') ) !!}
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
            {!! Form::label('vat_amount', __('models/invoices.fields.vat_amount') ) !!}
            {!! Form::number('vat_amount', null, ['class' => $errors->has('vat_amount') ? 'form-control auto_amount_cal is-invalid' : 'form-control auto_amount_cal','step'=>"any"]) !!}
            @if ($errors->has('vat_amount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat_amount') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- basic invoice fields (same for all) total -end --}}
    {{-- submit form (same for all) --}}
    <div class="col-sm-6 k-btn-sub">
        <!-- Submit Field -->
        <div class="form-group">
            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
            <a href="{{ route('invoice.index') }}" class="btn btn-outline-danger btn-flat btn-sm text-maroon" style="line-height:2;">@lang('crud.cancel')</a>
        </div>
    </div>
    {{-- submit form (same for all) -end --}}
</div>

<div class="row">

</div>


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
                if(!$("#customer option[value='{{$invoice->customer}}']").length > 0){
                    var o = new Option("{{$invoice->customer}}", "{{$invoice->customer}}");
                    $(o).html("{{$invoice->customer}}");
                    $("#customer").append(o);
                    $('#customer').val("{{$invoice->customer}}"); // Select the option with a value of '1'
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
                        // console.log(field);
                    @endif
                });

                //auto amount calculate
                copy.find("input[name*='price']").add(copy.find("input[name*='qty']")).add(copy.find("input[name*='period']")).on('change', function(){
                    var period=copy.find("input[name*='period']").val();
                    if(period != 0 && period !='0'){
                        copy.find("input[name*='amount']").val(copy.find("input[name*='price']").val() * copy.find("input[name*='qty']").val() * period);
                    }
                    else{
                        copy.find("input[name*='amount']").val(copy.find("input[name*='price']").val() * copy.find("input[name*='qty']").val());
                    }
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
                //adjust new fields ased on type
                var invoice_type=$('input[type=radio][name=type]:checked').val();
                handelFields(invoice_type);
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
                    var prod=@json($products);
                    var start,end=0;
                    if (prod.length !== 0){
                        start=prod[0]['product_id'];
                        end=prod.pop()['product_id'];
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
.k-checked{
    text-align: center;
    /* border: 1px solid #f3f3f3; */
    padding: 8px 15px;
    border-radius: 7px;
    display: flex;
    justify-content: center;
    /* background-color:#f3f3f3; */
}
.k-checked input[type=radio]:checked:before{
       position: absolute;
    /* background: red; */
    right: -27px;
    top: -5px;
    left: -27px;
    width: 127px;
    border: 1px solid #d81b60;
    height: 32px;
    content: "";
    border-radius: 7px;
    /* height: 60px; */
    /* position: absolute; */
    /* width: 60px; */
    z-index: 1;
}
.k-checked input[type=radio]{
accent-color: #d81b60;
}

.k-checked input{
    margin-right: 5px;
    position: relative;
}

    .text-sm .card-title {
    font-size: 12px;
}
.card-header{
    padding:.50rem 1.25rem;
}
.text-sm .btn {
    font-size: 11px !important;
}
.text-sm {
    font-size: 11px !important;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400;
}
 /* .btn-group-sm>.btn, .btn-sm { */
    /* line-height: 1; */
    /* padding: 7px 9px !important; */
 /* } */
table.dataTable.table-sm > thead > tr > th {
    padding: 6px 10px !important;
    font-weight: 500;
    font-size: 12px;
}
.table td, .table th {
    padding: 0.002rem 0.6rem !important;
    vertical-align: middle;
    font-size: 12px;
}
.btn {
    padding: 0.275rem 0.75rem !important;
    height: calc(2.05rem + 1px) !important;
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
</style>
