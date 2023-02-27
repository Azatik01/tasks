@extends('layouts.base')
@section('content')
    <div class="row text-center pb-5">
        <h1 class="mt-5">Список задач</h1>
        <h3> Этот сайт предназначен для списков задач! <br>
            Пожалуйста, прежде чем продолжить, зарегистрируйтесь или залогинтесь
        </h3>
    </div>

    <div class="row text-center" style="display: block">
        <a href="{{route('users.register')}}">
            <button class="btn btn-outline-primary">Зарегистроироваться</button>
        </a>
        <a href="{{route('sessions.login')}}">
            <button class="btn btn-outline-success">
                Залогиниться
            </button>
        </a>
    </div>
@endsection
