@if(session('status'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    </div>
@endif