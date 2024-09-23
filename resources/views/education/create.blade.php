@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Training </h1>

    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" class="form-control" id="institution" name="institution" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Educational Level </label>
            <select name="level" class="form-control">
                <option value="">Select the Educational Level</option>
                <option value="Primary Basic Education">Primary Basic Education</option>
                <option value="Secondary Basic Education">Secondary Basic Education</option>
                <option value="Secondary Education">Secondary Education</option>
                <option value="Technical Career">Technical Career</option>
                <option value="Technological Career">Technological Career</option>
                <option value="Professional Career">Professional Career</option>
                <option value="Specialization ">Specialization</option>
                <option value="Master's Degree">Master's Degree</option>
                <option value="Doctorate">Doctorate</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Professional Area</label>
            <input type="text" class="form-control" id="area" name="area" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
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
        <a href="{{ route('education.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection


