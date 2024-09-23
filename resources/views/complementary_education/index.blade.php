@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Complementary Education</h1>
    <a href="{{ route('complementary_education.create') }}" class="btn btn-primary mb-3">Añadir Complementary Education</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Institution</th>
                <th>Year</th>
                <th>Persona</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($complementaryEducations as $complementaryEducation)
            <tr>
                <td>{{ $complementaryEducation->name }}</td>
                <td>{{ $complementaryEducation->institution }}</td>
                <td>{{ $complementaryEducation->year }}</td>
                <td>{{ $complementaryEducation->personalData->first_name }} {{ $complementaryEducation->personalData->last_name }}</td>
                <td>
                    <a href="{{ route('complementary_education.edit', $complementaryEducation->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('complementary_education.destroy', $complementaryEducation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


