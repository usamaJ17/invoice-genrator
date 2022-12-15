<div class="row">
    <div class="col-md-3 col-sm-6">
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/vendors.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
</div>

    <div class="col-md-3 col-sm-6">


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/vendors.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => ($errors->has('email')) ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
</div>

    <div class="col-md-3 col-sm-6">
<!-- Contact Person Field -->
<div class="form-group">
    {!! Form::label('contact_person', __('models/vendors.fields.contact_person').':') !!}
    {!! Form::text('contact_person', null, ['class' => ($errors->has('contact_person')) ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('contact_person'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('contact_person') }}</strong>
        </span>
    @endif
</div>
</div>

    <div class="col-md-3 col-sm-6">


<!-- Contact No Field -->
<div class="form-group">
    {!! Form::label('contact_no', __('models/vendors.fields.contact_no').':') !!}
    {!! Form::text('contact_no', null, ['class' => ($errors->has('contact_no')) ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('contact_no'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('contact_no') }}</strong>
        </span>
    @endif
</div>

</div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">

<!-- Contact No Two Field -->
<div class="form-group">
    {!! Form::label('contact_no_two', __('models/vendors.fields.contact_no_two').':') !!}
    {!! Form::text('contact_no_two', null, ['class' => ($errors->has('contact_no_two')) ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('contact_no_two'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('contact_no_two') }}</strong>
        </span>
    @endif
</div>

</div>

<div class="col-md-3 col-sm-6">
    <!-- Vat No Field -->
    <div class="form-group">
        {!! Form::label('vat_no', __('models/vendors.fields.vat_no').':') !!}
        {!! Form::text('vat_no', null, ['class' => ($errors->has('vat_no')) ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('vat_no'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('vat_no') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-3 col-sm-6">
    <!-- Payment Terms Field -->
    <div class="form-group">
        {!! Form::label('payment_terms', __('models/vendors.fields.payment_terms').':') !!}
        {!! Form::text('payment_terms', null, ['class' => ($errors->has('payment_terms')) ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('payment_terms'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('payment_terms') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-3 col-sm-6">
    <!-- Credit Limit Field -->
    <div class="form-group">
        {!! Form::label('credit_limit', __('models/vendors.fields.credit_limit').':') !!}
        {!! Form::text('credit_limit', null, ['class' => ($errors->has('credit_limit')) ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('credit_limit'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('credit_limit') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-3 col-sm-6">
    <!-- Location Field -->
    <div class="form-group">
        {!! Form::label('location', __('models/vendors.fields.location').':') !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
</div>

   <div class="col-md-3 col-sm-6">
<!-- File Field -->
<div class="form-group pt-1">
            <div class="custom-file mt-4">
        {!! Form::file('file',['class' => 'custom-file-input']) !!}
        {!! Form::label('file', __('models/vendors.fields.file').':' , ['class' => 'custom-file-label']) !!}
    </div>
</div>
</div>
</div>

@section('scripts')
@parent
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
<div class="row">
    <div class="col-sm-12">

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-danger btn-flat btn-lg']) !!}
    <a href="{{ route('vendors.index') }}" class="btn btn-outline-danger btn-flat btn-lg text-maroon">@lang('crud.cancel')</a>
</div>
</div>
</div>
