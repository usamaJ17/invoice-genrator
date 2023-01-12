<div class='btn-group'>
    <a href="{{ route('purchase.show', $purchase_no) }}" class='btn btn-success'>
       <i class="fa fa-eye"></i>
    </a>
    <button type="button" data-toggle="modal" data-target="#modal-type" data-type="edit" id="{{$purchase_no}}" class='btn btn-info'>
       <i class="fa fa-edit"></i>
    </button>
    <button type="button" data-toggle="modal" data-target="#modal-type" data-type="delete" id="{{$purchase_no}}" class='btn btn-danger'>
        <i class="fa fa-trash"></i>
     </button>
</div>
