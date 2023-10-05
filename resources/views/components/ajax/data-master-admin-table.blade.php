@include('helpers.datatables-helper')

<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-body">
                <table id="dataAdmin" class="table table-hover table-product dataTable no-footer" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Place, Date of Birth</th>
                            <th>Gender</th>
                            <th class="sorting_disabled"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>