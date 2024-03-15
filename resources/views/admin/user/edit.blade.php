@extends('layout.main')

@section('page-title', 'Edit User')

@section('main-section')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">Edit Users</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-row">

                            <x-fields.input-field class="col-xl-4 mb-3" label="Full Name" name="name"
                                value="{{ $user->name }}" />

                            <x-fields.input-field class="col-xl-4 mb-3" label="Email" name="email"
                                value="{{ $user->email }}" />

                            <x-fields.dropdown-field class="col-xl-4 mb-3" label="User Role" name="role"
                                :options="[1 => 'Administrator', 2 => 'Editor', 3 => 'Viewer']" :selected="$user->user_role" />

                        </div>

                        <center><button class="btn btn-primary" type="submit">Update User</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection

@section('custom-script')
    <!-- DATA TABLE JS-->

    <!-- INPUT MASK JS-->
    <script src="{{ asset('../assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- FORMVALIDATION JS -->
    <script src="{{ asset('../assets/js/form-validation.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('../assets/js/custom.js') }}"></script>

@endsection
