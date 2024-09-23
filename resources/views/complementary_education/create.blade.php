@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Complementary Education</h1>

    <form action="{{ route('complementary_education.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" name="institution" id="institution" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="personal_data_id">Persona</label>
            <select name="personal_data_id" id="personal_data_id" class="form-control">
                @foreach($personalData as $person)
                <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('complementary_education.index') }}" class="btn btn-secondary">Atrás</a>
    </form>
</div>
@endsection

