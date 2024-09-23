@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Idioma</h1>

    <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="language" class="form-label">Idioma</label>
            <input type="text" class="form-control" id="language" name="language" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Nivel</label>
            <input type="text" class="form-control" id="level" name="level" required>
        </div>
        <div class="mb-3">
            <label for="personal_data_id" class="form-label">Persona</label>
            <select name="personal_data_id" id="personal_data_id" class="form-control">
                @foreach($personalData as $person)
                <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('languages.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection

