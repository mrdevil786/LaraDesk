@extends('admin.layout.main')

@section('admin-page-title', 'Users')

@section('admin-main-section')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">My Profile</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Password</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update.password') }}" method="POST">
                        @csrf

                        <div class="text-center chat-image mb-5">
                            <div class="mb-3">
                                <span class="avatar avatar-xxl brround cover-image"
                                    data-bs-image-src="{{ asset($user->avatar ?? 'assets/profile.svg') }}"></span>
                            </div>
                            <div>
                                <a href="profile.html">
                                    <h5 class="mb-1 text-dark fw-semibold">{{ $user->name }}</h5>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 form-control @error('current_password') is-invalid @enderror"
                                    type="password" name="current_password" placeholder="Current Password"
                                    autocomplete="current-password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 form-control @error('new_password') is-invalid @enderror"
                                    type="password" name="new_password" placeholder="New Password"
                                    autocomplete="new-password">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input
                                    class="input100 form-control @error('new_password_confirmation') is-invalid @enderror"
                                    type="password" name="new_password_confirmation" placeholder="Confirm Password"
                                    autocomplete="new-password">
                                @error('new_password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <x-fields.input-field label="Full Name" name="name" value="{{ $user->name }}" />
                            <x-fields.input-field label="Email" name="email" value="{{ $user->email }}" />
                            <x-fields.input-field label="Avatar" name="avatar" type="file" />
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

@endsection


@section('custom-script')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('../assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('../assets/js/table-data.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('../assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('../assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('../assets/js/show-password.min.js') }}"></script>

@endsection
