@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Investigación</h1>
    <form action="{{ route('research.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        <div class="form-group">
            <label for="personal_data_id">Autor</label>
            <select name="personal_data_id" class="form-control" required>
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}">{{ $data->first_name }} {{ $data->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('research.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection

