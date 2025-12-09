@extends('layouts.app')

@section('title', 'Футболисты - Золотой мяч 2022')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Футболисты - номинанты на Золотой мяч</h1>
    <a href="{{ route('players.create') }}" class="btn btn-primary">
        Добавить футболиста
    </a>
</div>

<div class="row">
    @foreach($players as $player)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">
            @if($player->image_path)
                <img src="{{ Storage::url($player->image_path) }}" 
                     class="card-img-top" 
                     alt="{{ $player->title }}"
                     style="height: 250px; object-fit: cover;">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                     style="height: 250px;">
                    <span class="text-muted">Нет изображения</span>
                </div>
            @endif
            
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $player->title }}</h5>
                <span class="badge 
                    @if($player->place == 1) bg-warning text-dark
                    @elseif($player->place == 2) bg-secondary
                    @elseif($player->place == 3) bg-info text-dark
                    @else bg-primary @endif mb-2">
                    {{ $player->place }} место
                </span>
                <p class="card-text flex-grow-1">{{ Str::limit($player->description, 100) }}</p>
                
                <div class="mt-auto">
                    <div class="btn-group w-100">
                        <a href="{{ route('players.show', $player) }}" class="btn btn-outline-primary btn-sm">Просмотр</a>
                        <a href="{{ route('players.edit', $player) }}" class="btn btn-outline-secondary btn-sm">Редактировать</a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                    onclick="return confirm('Удалить футболиста?')">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection