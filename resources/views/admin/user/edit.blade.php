@extends('admin.layout.main')

@section('admin-page-title', $isEdit ? 'Edit User' : 'View User')

@section('admin-main-section')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">{{ $isEdit ? 'Edit User' : 'View User' }}</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEdit ? 'Edit User' : 'View User' }}</h3>
                </div>
                <div class="card-body">
                    @if ($isEdit)
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                    @endif

                    <div class="form-row">
                        <div class="col-xl-4 mb-3">
                            <label class="form-label mt-0" for="name">Full Name</label>
                            @if ($isEdit)
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}">
                            @else
                                <p class="form-control">{{ $user->name }}</p>
                            @endif
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-4 mb-3">
                            <label class="form-label mt-0" for="email">Email</label>
                            @if ($isEdit)
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}">
                            @else
                                <p class="form-control">{{ $user->email }}</p>
                            @endif
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-4 mb-3">
                            <label class="form-label mt-0" for="role">User Role</label>
                            @if ($isEdit)
                                <select class="form-select form-control" id="role" name="role">
                                    <option value="1" {{ old('role', $user->user_role) == 1 ? 'selected' : '' }}>
                                        Administrator</option>
                                    <option value="2" {{ old('role', $user->user_role) == 2 ? 'selected' : '' }}>
                                        Editor</option>
                                    <option value="3" {{ old('role', $user->user_role) == 3 ? 'selected' : '' }}>
                                        Viewer</option>
                                </select>
                            @else
                                <p class="form-control">
                                    @switch($user->user_role)
                                        @case(1)
                                            Administrator
                                        @break

                                        @case(2)
                                            Editor
                                        @break

                                        @case(3)
                                            Viewer
                                        @break
                                    @endswitch
                                </p>
                            @endif
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($isEdit)
                            <x-fields.input-field label="Avatar" name="avatar" type="file" />
                        @else
                            <p>{{ $user->avatar }}</p>
                        @endif

                    </div>


                    @if ($isEdit)
                        <center><button class="btn btn-primary" type="submit">Update User</button></center>
                    @endif

                    @if ($isEdit)
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection

@section('custom-script')
    <!-- DATA TABLE JS-->
    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- FORMVALIDATION JS -->
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endsection
