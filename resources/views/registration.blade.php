@extends('constructors.app')

@section('title')
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="text-center">
        <form action="{{ route('registration') }}" method="post" class="form-signin">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
            <label for="name" class="">Логин</label>
            <input type="text" id="name" class="form-control" placeholder="Логин" required name="name">
            <label for="email" class="">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="@mail.ru" required>
            <label for="password" class="">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="1234567" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегестрироваться</button>
            <a class="redirect" href="{{ route('login') }}">Уже есть у нас?</a>
        </form>
    </div>
@endsection
