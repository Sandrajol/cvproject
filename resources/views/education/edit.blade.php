@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Educación</h1>

    <form action="{{ route('education.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="institution" class="form-label">Institución</label>
            <input type="text" class="form-control" id="institution" name="institution" value="{{ $education->institution }}" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Nivel</label>
            <input type="text" class="form-control" id="level" name="level" value="{{ $education->level }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Campo</label>
            <input type="text" class="form-control" id="area" name="area" value="{{ $education->area }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $education->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $education->end_date }}">
        </div>
        <div class="mb-3">
            <label for="personal_data_id" class="form-label">Persona</label>
            <select name="personal_data_id" id="personal_data_id" class="form-control">
                @foreach($personalData as $person)
                <option value="{{ $person->id }}" {{ $education->personal_data_id == $person->id ? 'selected' : '' }}>
                    {{ $person->first_name }} {{ $person->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('education.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection

