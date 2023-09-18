@include('components.modal.modal-detail-admin')

<div class="card-body px-3 px-md-5">
    <div class="row">
        @foreach ($admins as $admin)
        <div class="col-lg-6 col-xl-4">
            <div class="card card-default p-4">
                <a href="javascript:0" class="media text-secondary" data-bs-toggle="modal" data-bs-target="#modal-detail-admin">
                <img src="images/user/u-xl-1.jpg" class="mr-3 img-fluid rounded" alt="Avatar Image">
                
                    <div class="media-body">
                        <h5 class="mt-0 mb-2 text-dark text-capitalize">{{ $admin->name }}</h5>
                        <ul class="list-unstyled text-smoke text-smoke">
                            <li class="d-flex">
                                <i class="mdi mdi-email mr-1"></i>
                                <span>{{ $admin->email }}</span>
                            </li>
                            <li class="d-flex">
                                <i class="mdi mdi-phone mr-1"></i>
                                <span>{{ $admin->phone }}</span>
                            </li>
                            <li class="d-flex">
                                <i class="mdi mdi-map mr-1"></i>
                                <span>{{ $admin->address }}</span>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>