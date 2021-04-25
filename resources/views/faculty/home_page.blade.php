<div class="card">
    <div class="card-header">{{ __('Faculty Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @elseif (session()->has('rmessage'))
                        <div class="alert alert-warning">
                            {{ session()->get('rmessage') }}
                        </div>
                    @endif
        {{ __('You are logged in!') }}
    </div>
</div>
