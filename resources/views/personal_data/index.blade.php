@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Personal Data</h1>
    <a href="{{ route('personal_data.create') }}" class="btn btn-primary">Add New</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Identification</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($personalData as $data)
                <tr>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->identification }}</td>
                    <td>
                        <a href="{{ route('personal_data.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('personal_data.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
