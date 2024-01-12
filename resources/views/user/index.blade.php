@extends('layout.main')

@section('main-section')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">Manage Users</h1>
            <button class="btn btn-primary off-canvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add User</button>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Role</th>
                                    <th class="wd-20p border-bottom-0">Name</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-10p border-bottom-0">Verified</th>
                                    <th class="wd-25p border-bottom-0">Created At</th>
                                    <th class="wd-25p border-bottom-0">Updated At</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->user_role == 1 ? 'Admin' : 'User' }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>{{ $user->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!--Right Offcanvas-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Add New User</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fe fe-x fs-18"></i></button>
        </div>
        <div class="offcanvas-body">
            <form>
                <div class="form-row">
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer01">Full Name</label>
                        <input type="text" class="form-control is-valid" id="validationServer01"
                            value="" placeholder="Full Name" required>
                        {{-- <div class="valid-feedback">Looks good!</div> --}}
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer02">Email</label>
                        <input type="text" class="form-control is-valid" id="validationServer02"
                            value="" placeholder="Email" required>
                        {{-- <div class="valid-feedback">Looks good!</div> --}}
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer02">Password</label>
                        <input type="text" class="form-control is-valid" id="validationServer02"
                            value="" placeholder="Password" required>
                        {{-- <div class="valid-feedback">Looks good!</div> --}}
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer04">User Role</label>
                        <select class="form-select form-control is-invalid"
                            id="validationServer04"
                            aria-describedby="validationServer04Feedback" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Administrator</option>
                            <option>Editor</option>
                            <option>Viewer</option>
                        </select>
                        {{-- <div id="validationServer04Feedback" class="invalid-feedback">Please
                            select a valid state.</div> --}}
                    </div>
                </div>
                
                <div class="col-xl-12 text-center">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
    <!--/Right Offcanvas-->

@endsection

@section('custom-script')
    <!-- DATA TABLE JS-->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/table-data.js"></script>
@endsection
