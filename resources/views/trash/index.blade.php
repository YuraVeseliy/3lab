@extends('layouts.app')

@section('title', 'Корзина - Удаленные футболисты')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Корзина</h1>
        <a href="{{ route('players.index') }}" class="btn btn-secondary">
            ← Назад к списку
        </a>
    </div>

    @if($trashedPlayers->isEmpty())
        <div class="card">
            <div class="card-body text-center py-5">
                <h5 class="card-title text-muted">Корзина пуста</h5>
                <p class="text-muted">Здесь будут отображаться удаленные футболисты</p>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Имя футболиста</th>
                                <th class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashedPlayers as $player)
                            <tr>
                                <td>
                                    <strong>{{ $player->title }}</strong>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <form action="{{ route('trash.restore', $player->id) }}" method="POST" class="d-inline me-2">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                Восстановить
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('trash.force-delete', $player->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" 
                                                    onclick="return confirm('Удалить навсегда? Это действие нельзя отменить.')">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-group .btn {
        min-width: 120px;
    }
</style>
@endsection