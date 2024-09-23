@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Professional Profiles</h1>
    <a href="{{ route('professional_profile.create') }}" class="btn btn-primary">Add New Profile</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Person</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{ $profile->Profile }}</td>
                    <td>{{ $profile->personalData->first_name }} {{ $profile->personalData->last_name }}</td>
                    <td>
                        <a href="{{ route('professional_profile.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('professional_profile.destroy', $profile->id) }}" method="POST" style="display:inline-block;">
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


