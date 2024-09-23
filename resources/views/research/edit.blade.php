@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Investigación</h1>
    <form action="{{ route('research.update', $research->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $research->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" rows="3" required>{{ $research->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" name="date" value="{{ $research->date }}" required>
        </div>
        <div class="form-group">
            <label for="personal_data_id">Autor</label>
            <select name="personal_data_id" class="form-control" required>
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}" {{ $research->personal_data_id == $data->id ? 'selected' : '' }}>
                        {{ $data->first_name }} {{ $data->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('research.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection
