<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="148332471928-7uhbcnrak3jq91gqq176tnk7n2kaool4.apps.googleusercontent.com.apps.googleusercontent.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

 @include('inc.css')
</head>

<body style="background: #466368;
background: linear-gradient( #7071db, #ffffff) no-repeat;">
    <div id="app" >
        <main>
            @yield('content')

        </main>
    </div>
</body>

<script>

</script>

</html>
