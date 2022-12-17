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
    {{-- echo Form::select('size', ['L' => 'Large', 'S' => 'Small']); --}}
    @section('css')
    @parent
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @endsection
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('user_id', __('models/invoices.fields.name')) !!}
            <div class="input-group">
                {!! Form::select('user_id',$data, null , ['class' => $errors->has('user_id') ? 'form-control is-invalid' : 'form-control', 'id' => 'user_id']) !!}
                <span class="input-group-append">
                    <button type="button" data-toggle="modal" data-target="#modal-company" class="btn btn-danger"><i class="fas fa-plus"></i></button>
                </span>
                @if ($errors->has('user_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    @section('scripts')
    @parent
        <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <script>
            $('#user_id').select2({
            theme: 'bootstrap4'
            })
        </script>
    @endsection
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('authorized', __('models/invoices.fields.authorized') .' *') !!}
            {!! Form::text('authorized', null, ['class' => $errors->has('authorized') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('authorized'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('authorized') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('phone', __('models/invoices.fields.phone') .' *') !!}
            {!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('phone'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('trn', __('models/invoices.fields.trn') .' *') !!}
            {!! Form::text('trn', null, ['class' => $errors->has('trn') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('trn'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('trn') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('payment', __('models/invoices.fields.payment') .' *') !!}
            {!! Form::number('payment', null, ['class' => $errors->has('payment') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('payment'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('payment') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('lpo', __('models/invoices.fields.lpo') .' *') !!}
            {!! Form::text('lpo', null, ['class' => $errors->has('lpo') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('lpo'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('lpo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('address', __('models/invoices.fields.address') .' *') !!}
            {!! Form::text('address', null, ['class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('address'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('remarks', __('models/invoices.fields.remarks') .' *') !!}
            {!! Form::text('remarks', null, ['class' => $errors->has('remarks') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('remarks'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('remarks') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- <div class="col-sm-4">
        <div class="form-group ">
            {!! Form::label('authorized', __('models/invoices.fields.authorized') .' *') !!}
            {!! Form::text('authorized', null, ['class' => $errors->has('authorized') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('authorized'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('authorized') }}</strong>
                </span>
            @endif
        </div>
    </div> --}}
</div>
{{-- basic invoice fields (same for all) end --}}

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
@if (str_contains(url()->current(), '/edit'))
@foreach ($products as $product)
<div class="row" id="exp_file_row">
    @include(strtolower(__('models/invoices.plural')).'.edit_product_fields')
</div>
@endforeach
@endif

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}

{{-- products Services  --}}

<br>
<h3 class="services">Service :</h3>
<div class="row services">
    @include(strtolower(__('models/invoices.plural')).'.service_fields')
</div>

{{-- products fields (few difference-- will be handeled by a jquery script) -end --}}


{{-- basic invoice fields (same for all) total --}}
<h3>Total :</h3>
<br>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('total', __('models/invoices.fields.total') .' *') !!}
            {!! Form::number('total', null, ['class' => $errors->has('total') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('total'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('total') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('discount', __('models/invoices.fields.discount') .' *') !!}
            {!! Form::number('discount', null, ['class' => $errors->has('discount') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('discount'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('gross', __('models/invoices.fields.gross') .' *') !!}
            {!! Form::number('gross', null, ['class' => $errors->has('gross') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('gross'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('gross') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('vat', __('models/invoices.fields.vat') .' *') !!}
            {!! Form::number('vat', null, ['class' => $errors->has('vat') ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('vat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('vat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
            {!! Form::label('vat_amount', __('models/invoices.fields.vat_amount') .' *') !!}
            {!! Form::number('vat_amount', null, ['class' => $errors->has('vat_amount') ? 'form-control is-invalid' : 'form-control']) !!}
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
    {{-- -- exp_doc uplode field name change script-- --}}
       <script type="text/javascript">
        $(document).ready(function() {
            $('.date').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
            // change fileds based on type
            @if(isset($invoice->type))
                var type="{{$invoice->type}}"
                handelFields(type);
            @endif
            $('.sale_field').hide();
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
                }
            }
            // change fileds based on type -end
            
            // clone products row
            var totalRow=$('#total_row').val();
            var row=$('#exp_file_row').clone(false);
            $('#add_new_exp_field').click(function() {
                totalRow++;
                $('#total_row').val(totalRow);
                var copy=row.clone(false);
                // console.log(copy.attr('id'));
                var fields=copy.find(':input');
                $.each( fields, function( key, field ) {
                    field.name=field.name.replace(/\d+/,totalRow);
                });
                copy.find('#exp_del').click(function() {
                    copy.remove();
                });
                $('#add_new_exp_field').after(copy);
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
            // clone products row -end
        });
    </script>
        {{-- -- exp_doc uplode field name change script end-- --}}
@endsection
{{-- scrtipts (clone products row and change fileds based on type) -end --}}

{{-- scrtipts (user search and add new) --}}
@section('scripts')
    @parent
    <script>
    // Add Company
    function addUser(e){
        e.preventDefault();

        var user_name = $("input[name=user_name]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: "{{route('addUsers')}}",
            data: {user_name:user_name},
            success:function(data){
                $("#user_id").append("<option value='"+data.id+"' selected>"+data.name+"</option>");
                $('#user_id').trigger('change');
                var num = $('#user_id option').length;
                $('#user_id').prop('selectedIndex', num-1);

                clearForm()
                toast.fire({
                    type: 'success',
                    title: 'User added Successfully.'
                });
            },
            error: function (xhr) {
                if (xhr.status == 422) {
                    var errors = JSON.parse(xhr.responseText);
                    $.each(errors, function(key, value) {
                        $("input[name="+key+"]").addClass('is-invalid');
                        $("input[name="+key+"]").next('span').text(value[0]);
                    });
                }
                if (xhr.status == 423) {
                    var errors = JSON.parse(xhr.responseText);
                    clearForm()
                    toast.fire({
                        type: 'error',
                        title: errors
                    });
                }
            }
        });
    }

    // clear model
    function clearForm(){
        $("input").removeClass('is-invalid');
        $(".invalid-feedback").text('');
        $('#company-form')[0].reset();
        $("#modal-company").modal('hide');
        document.getElementById('submit').removeAttribute('disabled');
    }
    function clearFormType(){
        $("input").removeClass('is-invalid');
        $(".invalid-feedback").text('');
        $('#type-form')[0].reset();
        $("#modal-type").modal('hide');
        document.getElementById('submit').removeAttribute('disabled');
    }
    </script>
    {{-- Add company model --}}
    <div class="modal fade" id="modal-company">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"> Add User</h4>
            </div>
            <form id="company-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>User Name:</label>
                        <input type="text" name="user_name" class="form-control" />
                        <span class="invalid-feedback" >
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" onclick="clearForm()" class="btn btn-default">Close</button>
                    <button type="button" id="submit" onclick="addUser(event)" class="btn btn-danger">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
{{-- scrtipts (user search and add new) -end --}}