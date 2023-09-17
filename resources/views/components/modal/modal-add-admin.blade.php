<div class="modal fade" id="modal-add-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form >
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Contact</h5>
            </div>
            <div class="modal-body px-4">

                <div class="form-group row mb-6">
                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                <div class="col-sm-8 col-lg-10">
                    <div class="custom-file mb-1">
                    <input type="file" class="custom-file-input" id="coverImage" required>
                    <label class="custom-file-label" for="coverImage">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
                </div>

                <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" value="Albrecht">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" value="Straub">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                    <label for="userName">User name</label>
                    <input type="text" class="form-control" id="userName" value="Doe">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="albrecht.straub@gmail.com">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                    <label for="Birthday">Birthday</label>
                    <input type="text" class="form-control" id="Birthday" value="01-10-1993">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                    <label for="event">Event</label>
                    <input type="text" class="form-control" id="event" value="Some value for event">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-smoke btn-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-pill">Save Contact</button>
            </div>
            </form>
        </div>
    </div>
</div>