@extends('layouts.app')

@section('title', 'Редактировать ' . $player->title . ' - Золотой мяч 2022')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Редактировать футболиста: {{ $player->title }}</h4>
            </div>
            
            <div class="card-body">
                <form action="{{ route('players.update', $player) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Имя футболиста *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $player->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Краткое описание *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3" required>{{ old('description', $player->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="full_description" class="form-label">Полное описание *</label>
                        <textarea class="form-control @error('full_description') is-invalid @enderror" 
                                  id="full_description" name="full_description" rows="5" required>{{ old('full_description', $player->full_description) }}</textarea>
                        @error('full_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="achievements" class="form-label">Достижения *</label>
                        <input type="text" class="form-control @error('achievements') is-invalid @enderror" 
                               id="achievements" name="achievements" value="{{ old('achievements', $player->achievements) }}" required>
                        @error('achievements')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="place" class="form-label">Место в рейтинге *</label>
                        <input type="number" class="form-control @error('place') is-invalid @enderror" 
                               id="place" name="place" value="{{ old('place', $player->place) }}" min="1" max="10" required>
                        @error('place')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if($player->image_path)
                            <div class="mt-2">
                                <p>Текущее изображение:</p>
                                <img src="{{ Storage::url($player->image_path) }}" 
                                     alt="Current image" 
                                     style="max-height: 200px;">
                            </div>
                        @endif
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                        <a href="{{ route('players.index') }}" class="btn btn-secondary">Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection