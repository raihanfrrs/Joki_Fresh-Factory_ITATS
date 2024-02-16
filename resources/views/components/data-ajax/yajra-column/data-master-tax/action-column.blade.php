<div class="d-flex justify-content-center">
    <a href="javascript:;" class="text-body" data-bs-target="#editTax" data-bs-toggle="modal" id="button-trigger-modal-edit-tax" data-id="{{ $model->id }}"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    <form action="{{ route('master.taxes.destroy', $model->id) }}" method="post" class="form-delete-tax-{{ $model->id }}">
        @csrf
        @method('delete')
        <a href="javascript:;" class="text-body" data-id="{{ $model->id }}" id="button-delete-tax">
            <i class="ti ti-trash ti-sm mx-2"></i>
        </a>
    </form>
</div>