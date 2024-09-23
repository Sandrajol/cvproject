@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Awards</h1>
    <a href="{{ route('awards.create') }}" class="btn btn-primary">Add New Award</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Award</th>
                <th>Institution</th>
                <th>Year</th>
                <th>Person</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($awards as $award)
            <tr>
                <td>{{ $award->award }}</td>
                <td>{{ $award->institution }}</td>
                <td>{{ $award->year }}</td>
                <td>{{ $award->personalData->first_name }} {{ $award->personalData->last_name }}</td>
                <td>
                    <a href="{{ route('awards.edit', $award->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('awards.destroy', $award->id) }}" method="POST" style="display:inline-block;">
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

