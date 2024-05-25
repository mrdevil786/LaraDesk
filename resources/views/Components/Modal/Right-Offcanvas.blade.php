<div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $id }}" aria-labelledby="{{ $id }}Label">
    <div class="offcanvas-header">
        <h5 id="{{ $id }}Label">{{ $title }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fe fe-x fs-18"></i></button>
    </div>
    <div class="offcanvas-body">
        <form method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                {{ $slot }}
            </div>

            <div class="col-xl-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
