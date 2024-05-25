@if(isset($href))
    <a href="{{ $href }}">
@endif
    <button class="btn btn-outline-{{ $iconColor }} btn-pill btn-sm" data-bs-toggle="offcanvas"
        data-bs-target="#{{ $modalTarget }}" aria-controls="{{ $modalTarget }}">
        <i class="{{ $iconClass }}"></i>
    </button>
@if(isset($href))
    </a>
@endif