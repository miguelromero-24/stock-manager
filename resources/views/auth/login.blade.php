@extends('template')

@section('content')
    <div class="mdl-grid demo-content">
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--5-col mdl-cell--5-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                    <h2 class="mdl-card__title-text">Login</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    {{ Form::open(array('url' => url('login'), 'method' => 'post', 'id' => 'loginForm')) }}
                    {{ Form::label('username', 'Usuario: ') }}
                    {{ Form::text('username', null, array('class' => 'mdl-textfield')) }}
                    {{ Form::label('password', 'Pass: ') }}
                    {{ Form::password('password',  array('class' => 'mdl-textfield')) }}
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" onclick="document.getElementById('loginForm').submit();"
                       class="mdl-button mdl-js-button mdl-js-ripple-effect"
                       data-upgraded=",MaterialButton,MaterialRipple">Enviar<span
                                class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop