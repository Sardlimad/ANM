@if ($message = Session::get('success'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning bg-warning text-light border-0 alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info bg-info text-light border-0 alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        {{$errors->first('city')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
