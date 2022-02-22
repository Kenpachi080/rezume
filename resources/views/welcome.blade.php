@extends('constructors.app')

@section('title')
    <title>Контакты</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection
@section('header')
    <form method="POST" action="{{ route('create') }}">@csrf
        <button>Создать контакт</button>
    </form>
@endsection
@section('content')

    @foreach($contacts as $contact)
        <div class="allcard">
            @if (in_array($contact->id, $favorites))
                <div class="card favorite">
                    <form method="POST" action="{{ route('favoritePostDelete') }}">
                        @csrf
                        <p class="title_card">{{ $contact->id }}</p><br>
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <button class="addFavorite">Убрать из избранных</button>
                    </form>
                </div>
            @else
                <div class="card">
                    <form method="POST" action="{{ route('favoritePost') }}">
                        @csrf
                        <p class="title_card">{{ $contact->id }}</p><br>
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <button class="addFavorite">Добавить в избранное</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
@endsection
