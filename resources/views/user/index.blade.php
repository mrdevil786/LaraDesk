@extends('layout.main')

@section('main-section')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">Manage Users</h1>
            <button class="btn btn-primary off-canvas" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add User</button>
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
                        <table class="table table-bordered text-nowrap border-bottomm" id="file-datatable">
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
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($user->user_role == 1)
                                                Admin
                                            @elseif($user->user_role == 2)
                                                Manager
                                            @elseif($user->user_role == 3)
                                                Member
                                            @else
                                                Unknown
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td class="text-center">
                                            @if ($user->status == 'active')
                                                <x-extras.small-pill pillColor="success" pillText="Active" />
                                            @elseif ($user->status == 'blocked')
                                                <x-extras.small-pill pillColor="danger" pillText="Blocked" />
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <x-buttons.action-pill-button iconClass="fa fa-eye" iconColor="secondary" />

                                            @if (auth()->user()->user_role != 3)
                                                <x-buttons.action-pill-button iconClass="fa fa-pencil"
                                                    iconColor="warning" />
                                            @endif
                                            @if (auth()->user()->user_role == 1)
                                                <x-buttons.action-pill-button href="{{ route('admin.users.destroy', $user->id) }}"
                                                    iconClass="fa fa-trash" iconColor="danger" />
                                            @endif
                                        </td>
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
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="fe fe-x fs-18"></i></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf <!-- Add CSRF token -->

                <div class="form-row">
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer01">Full Name</label>
                        <input type="text" class="form-control is-valid" id="validationServer01" name="name"
                            value="" placeholder="Full Name" required>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer02">Email</label>
                        <input type="text" class="form-control is-valid" id="validationServer02" name="email"
                            value="" placeholder="Email" required>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer03">Password</label>
                        <input type="password" class="form-control is-valid" id="validationServer03" name="password"
                            placeholder="Password" required>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer04">Confirm Password</label>
                        <input type="password" class="form-control is-valid" id="validationServer04"
                            name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label for="validationServer05">User Role</label>
                        <select class="form-select form-control is-invalid" id="validationServer05" name="role"
                            aria-describedby="validationServer05Feedback" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="1">Administrator</option>
                            <option value="2">Editor</option>
                            <option value="3">Viewer</option>
                        </select>
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
