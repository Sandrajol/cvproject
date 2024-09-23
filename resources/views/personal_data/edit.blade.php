@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Personal Data</h1>

    <form action="{{ route('personal_data.update', $personalData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $personalData->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $personalData->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="identification">Identification</label>
            <input type="text" name="identification" class="form-control" value="{{ $personalData->identification }}" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $personalData->birth_date }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male" {{ $personalData->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $personalData->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $personalData->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $personalData->phone }}" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" value="{{ $personalData->country }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" class="form-control" value="{{ $personalData->department }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" value="{{ $personalData->city }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('personal_data.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

