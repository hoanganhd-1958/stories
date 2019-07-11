<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="{{ App::getLocale() }}" />

    <title>{{ __('Website title') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/vue-multiselect.min.css') }}">

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div id="app" class="wrapper">
        <router-view></router-view>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>