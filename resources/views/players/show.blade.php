@extends('layouts.app')

@section('title', $player->title . ' - Золотой мяч 2022')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Информация о футболисте</h4>
                <a href="{{ route('players.index') }}" class="btn btn-secondary">Назад к списку</a>
            </div>
            
            <div class="card-body">
                @if($player->image_path)
                    <div class="text-center mb-4">
                        <img src="{{ Storage::url($player->image_path) }}" 
                             alt="{{ $player->title }}" 
                             class="img-fluid rounded"
                             style="max-height: 400px;">
                    </div>
                @endif
                
                <h2 class="card-title">{{ $player->title }}</h2>
                <span class="badge 
                    @if($player->place == 1) bg-warning text-dark
                    @elseif($player->place == 2) bg-secondary
                    @elseif($player->place == 3) bg-info text-dark
                    @else bg-primary @endif mb-3 fs-6">
                    {{ $player->place }} место
                </span>
                
                <div class="mb-4">
                    <h5>Описание:</h5>
                    <p class="card-text">{{ $player->full_description }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>Достижения:</h5>
                    <p class="card-text text-success fw-semibold">{{ $player->achievements }}</p>
                </div>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('players.edit', $player) }}" class="btn btn-primary">Редактировать</a>
                    <a href="{{ route('players.index') }}" class="btn btn-secondary">Назад к списку</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection