@extends('layouts.admin')

@section('section')

@include('components.modal.modal-add-admin')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header align-items-center px-3 px-md-5">
            <h2>Admin</h2>

                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" id="table-view-btn"> Table View </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-admin"> Add Admin </button>
                </div>
            </div>

            <div id="data-master-admin"></div>
        </div>

    </div>
</div>
@endsection