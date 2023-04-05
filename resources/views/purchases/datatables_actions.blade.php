{!! Form::open(['route' => ['purchase.destroy', $purchase_no], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('purchase.show', $purchase_no) }}" class='btn btn-success1'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('purchase.edit', $purchase_no) }}" class='btn btn-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
