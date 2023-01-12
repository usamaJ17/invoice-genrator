<input type="hidden" name='part_id' value={{$part->part_id}}>
    <div class="col-sm-3">
        <!-- File Field -->
        <div class="form-group">
            {!! Form::label('name',__('models/products.fields.name')) !!}
            <div class="input-group">
                    {{-- {!! Form::text('name_1', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!} --}}
                    {!! Form::text('name_'.$part->part_id,$part->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_name"]) !!}
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <!-- File Field -->
        <div class="form-group">
            {!! Form::label('unit',__('models/products.fields.unit')) !!}
            <div class="input-group">
                {{-- {!! Form::select('unit_1', config('enum.unit'),null,['class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_unit"]) !!} --}}
                {!! Form::select('unit_'.$part->part_id , config('enum.unit') , $part->unit, ['class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control' ,'id'=>"doc_unit"]) !!}
    
                @if ($errors->has('unit'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('unit') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <!-- File Field -->
        <div class="form-group">
            {!! Form::label('qty',__('models/products.fields.qty')) !!}
            <div class="input-group">
                    {{-- {!! Form::number('qty_1', null, ['class' => $errors->has('qty') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_qty"]) !!} --}}
                    {!! Form::number('qty_'.$part->part_id,$part->qty, ['class' => $errors->has('qty') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_qty"]) !!}
    
                @if ($errors->has('qty'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('qty') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <!-- File Field -->
        <div class="form-group">
            {!! Form::label('price',__('models/products.fields.price')) !!}
            <div class="input-group">
                    {!! Form::number('price_'.$part->part_id,$part->price, ['class' => $errors->has('price') ? 'form-control num_type is-invalid' : 'form-control num_type' ,'id'=>"doc_price",'step'=>"any"]) !!}
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
                    {!! Form::number('amount_'.$part->part_id,$part->amount, [ 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control','id'=>"proc_amount", "readonly",'step'=>"any"]) !!}
                @if ($errors->has('amount'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            $("input[name='price_"+{{$part->part_id}}+"']").add("input[name='qty_"+{{$part->part_id}}+"']").on('change', function(){
                var period=$("input[name='period_"+{{$part->part_id}}+"']").val();
                $("input[name='amount_"+{{$part->part_id}}+"']").val($("input[name='price_"+{{$part->part_id}}+"']").val() * $("input[name='qty_"+{{$part->part_id}}+"']").val());
                $( "#discount" ).trigger( "keyup" );
            });
        });
    </script>
@endsection




