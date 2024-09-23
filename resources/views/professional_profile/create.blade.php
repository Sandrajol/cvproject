@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit your Professional Profile</h1>

    <form action="{{ route('professional_profile.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Profile">Description of your Professional Profile</label>
            <!-- Cambiamos el input por un textarea -->
            <textarea name="Profile" id="Profile" class="form-control" rows="5">{{ old('Profile') }}</textarea>
        </div>

        <div class="form-group">
            <label for="personal_data_id">Professional</label>
            <select name="personal_data_id" id="personal_data_id" class="form-control">
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}">{{ $data->first_name }} {{ $data->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Atrás</a>
    </form>

</div>
@endsection



