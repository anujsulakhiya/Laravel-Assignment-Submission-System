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

        <a href="/truncate_assignment" class="btn btn-danger btn-sm my_mainpage_link">Truncate Assignment</a>
        <a href="/truncate_batch" class="btn btn-danger btn-sm my_mainpage_link">Truncate Batch</a>
        <a href="/logActivity" class="btn btn-danger btn-sm my_mainpage_link">logActivity</a>
    </div>
</div>


<script>

    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });


</script>
