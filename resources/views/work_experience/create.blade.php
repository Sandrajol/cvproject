@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Experiencia Laboral</h1>
    <form action="{{ route('work_experience.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="company">Compañía</label>
            <input type="text" class="form-control" name="company" required>
        </div>
        <div class="form-group">
            <label for="position">Posición</label>
            <input type="text" class="form-control" name="position" required>
        </div>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" class="form-control" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin</label>
            <input type="date" class="form-control" name="end_date">
        </div>
        <div class="form-group">
            <label for="personal_data_id">Empleado</label>
            <select name="personal_data_id" class="form-control" required>
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}">{{ $data->first_name }} {{ $data->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('work_experience.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection
