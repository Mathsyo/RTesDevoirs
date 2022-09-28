@if(session('success'))  
    <div class="alert mb-3 alert-success alert-flash">
        {!! session('success') !!}
    </div>
@endif

@if(session('message'))
    <div class="alert mb-3 alert-primary alert-flash">
        {!! session('message') !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert mb-3 alert-danger alert-flash">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@else
    @if(session('error'))  
        <div class="alert mb-3 alert-danger alert-flash">
            {!! session('error') !!}
        </div>
    @endif
@endif