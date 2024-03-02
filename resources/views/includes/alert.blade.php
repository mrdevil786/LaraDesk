@if (session('success'))
    <div id="mainPageAlert" class="alert alert-success" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
        <span class="alert-inner--text"><strong>Success!</strong>
            {{ session('success') }}</span>
    </div>
@elseif (session('warning'))
    <div id="mainPageAlert" class="alert alert-warning" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-alert-triangle"></i></span>
        <span class="alert-inner--text"><strong>Warning!</strong>
            {{ session('warning') }}</span>
    </div>
@elseif (session('error'))
    <div id="mainPageAlert" class="alert alert-danger" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
        <span class="alert-inner--text"><strong>Error!</strong>
            {{ session('error') }}</span>
    </div>
@endif
