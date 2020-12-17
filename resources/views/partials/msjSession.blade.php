@if (session('status'))
    <div class="alert d-block @if(session('success')) alert-success @else alert-danger @endif">
        <p class="m-0">{{ session('status') }}</p>
    </div>
@endif
