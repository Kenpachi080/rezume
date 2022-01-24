@extends('constructors.app')

@section('title')
    <title>registration</title>
@endsection

@section('content')
    <h1>Registration</h1>
    <form align="center" action="{{ route('user.registration') }}" method="post">
        @csrf
        <input type="text" id="name" name="name"><br>
        @error('name')
        <p>{{ $message }}</p>
        @enderror
        <input type="text" id="email" name="email"><br>
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <input type="password" id="password" name="password"><br>
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        <button>Отправить</button>

    </form>

@endsection
