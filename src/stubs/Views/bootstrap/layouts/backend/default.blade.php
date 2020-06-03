<!DOCTYPE html>
<html lang="nl-NL">
<head>

    {!! view('layouts.meta') !!}

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    <link rel="shortcut icon" href="/favicon.png" />
</head>
<body>


<div class="container-fluid page-body-wrapper full-page-wrapper">

    <div class="main-panel full-width">
        <div class="content-wrapper">

            @yield('content')

        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                    Copyright &copy; {{ now()->year }} - {{ config('app.name', 'Laravel') }}
                </span>
            </div>
        </footer>
    </div>
</div>


<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

</body>
</html>
