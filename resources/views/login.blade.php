@extends('constructors.app')

@section('title')
 <title>Privet</title>
@endsection

@section('content')
    <h1>login</h1>
    @error('login')
    <p>{{ $message }}</p>
    @enderror
    <form align="center" action="{{ route('user.login') }}" method="post">
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
