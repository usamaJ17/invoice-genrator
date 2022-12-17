{!! Form::open(['route' => ['invoice.destroy', $invoice_no], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('invoice.show', $invoice_no) }}" class='btn btn-success'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="#" class='btn btn-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
