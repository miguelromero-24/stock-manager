<!doctype html>

<html lang="en">
@section('head')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Some Description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StockManagementSystem</title>
        @include('partials.cellphones')
        @include('partials.css')
        <style>
            .view-source {
                position: fixed;
                display: block;
                right: 0;
                bottom: 0;
                margin-right: 40px;
                margin-bottom: 40px;
                z-index: 900;
            }
        </style>
    </head>
@show
@section('body')
    <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        @if (Auth::check())
            @include('partials.header')
            @include('partials.left_navbar')
            <main class="mdl-layout__content mdl-color--grey-100">
        @else
            <main class="mdl-layout__content mdl">
        @endif
        <div class="mdl-grid demo-content">
            @yield('content')
        </div>
        </main>
                    {{--stroke--}}
        </div>
    </body>
@show
@section('javascript')
    @include('partials.javascript')
@show
</html>
