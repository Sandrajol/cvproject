@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Award</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('awards.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="award">Award</label>
            <input type="text" name="award" class="form-control" value="{{ old('award') }}">
        </div>

        <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" name="institution" class="form-control" value="{{ old('institution') }}">
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year') }}">
        </div>

        <div class="form-group">
            <label for="personal_data_id">Person</label>
            <select name="personal_data_id" class="form-control">
                @foreach($personalData as $data)
                    <option value="{{ $data->id }}">{{ $data->first_name }} {{ $data->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('awards.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

