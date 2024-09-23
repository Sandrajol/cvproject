@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Experiencia Laboral</h1>
    <form action="{{ route('work_experience.update', $workExperience->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="company">Compañía</label>
            <input type="text" class="form-control" name="company" value="{{ $workExperience->company }}" required>
        </div>
        <div class="form-group">
            <label for="position">Posición</label>
            <input type="text" class="form-control" name="position" value="{{ $workExperience->position }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" class="form-control" name="start_date" value="{{ $workExperience->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin</label>
            <input type="date" class="form-control" name="end_date" value="{{ $workExperience->end_date }}">
        </div>
        <div class="form-group">
            <label for="personal_data_id">Empleado</label>
            <select name="personal_data_id" class="form-control" required>
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}" {{ $workExperience->personal_data_id == $data->id ? 'selected' : '' }}>
                        {{ $data->first_name }} {{ $data->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('work_experience.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection
