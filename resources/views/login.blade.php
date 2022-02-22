@extends('constructors.app')

@section('title')
    <title>Аутентификация</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="text-center">
        <form action="{{ route('login') }}" method="post" class="form-signin">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Аутентификация</h1>
            @error('login')
            <div class="error">{{ $message }}</div>
            @enderror
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
            <label for="name" class="">Логин</label>
            <input type="text" id="name" class="form-control" placeholder="Логин" required name="name">
            <label for="email" class="">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="@mail.ru" required>
            <label for="password" class="">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="1234567" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Аунтефицироваться</button>
            <a class="redirect" href="{{ route('registration') }}">Впервые у нас?</a>
        </form>
    </div>
{{--    <div class="auth">--}}
{{--        <h1>Аутентификация</h1>--}}
{{--        @error('login')--}}
{{--        <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <form align="center" action="{{ route('login') }}" method="post">--}}
{{--            @csrf--}}
{{--            <label for="name">Логин</label>--}}
{{--            <input type="text" id="name" name="name"><br>--}}
{{--            @error('name')--}}
{{--            <p>{{ $message }}</p>--}}
{{--            @enderror--}}
{{--            <label for="email">E-mail</label>--}}
{{--            <input type="text" id="email" name="email"><br>--}}
{{--            @error('email')--}}
{{--            <p>{{ $message }}</p>--}}
{{--            @enderror--}}
{{--            <label for="password">Пароль</label>--}}
{{--            <input type="password" id="password" name="password"><br>--}}
{{--            @error('password')--}}
{{--            <p>{{ $message }}</p>--}}
{{--            @enderror--}}
{{--            <button>Отправить</button>--}}
{{--        </form>--}}
{{--    </div>--}}

@endsection
