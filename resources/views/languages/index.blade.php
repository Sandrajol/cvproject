@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Idiomas</h1>

    <a href="{{ route('languages.create') }}" class="btn btn-primary">Agregar Idioma</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Idioma</th>
                <th>Nivel</th>
                <th>Persona</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($languages as $language)
            <tr>
                <td>{{ $language->language }}</td>
                <td>{{ $language->level }}</td>
                <td>{{ $language->personalData->first_name }} {{ $language->personalData->last_name }}</td>
                <td>
                    <a href="{{ route('languages.edit', $language->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('languages.destroy', $language->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


