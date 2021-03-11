<div class="row justify-content-center mb-3">
    <div class="col-lg-9 text-center">
        @if(Session::has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>