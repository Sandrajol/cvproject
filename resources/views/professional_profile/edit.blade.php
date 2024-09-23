@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Professional Profile</h1>

    <form action="{{ route('professional_profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Profile">Profile</label>
            <textarea name="Profile" class="form-control" rows="4" maxlength="500" required>{{ $profile->Profile }}</textarea>
        </div>

        <div class="form-group">
            <label for="personal_data_id">Person</label>
            <select name="personal_data_id" class="form-control" required>
                @foreach($personalData as $person)
                    <option value="{{ $person->id }}" {{ $profile->personal_data_id == $person->id ? 'selected' : '' }}>
                        {{ $person->first_name }} {{ $person->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('professional_profile.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

