@extends('constructors.app')

@section('title')
    <title>Создание контакта</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div class="allcard">
        <div class="card favorite">
            <form method="POST" action="{{ route('favoritePost') }}">
                <p class="title_card">contanct</p><br>
                <button class="addFavorite">Добавить в избранное</button>
            </form>
        </div>
    </div>
@endsection
