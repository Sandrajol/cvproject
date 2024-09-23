@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Investigaciones</h1>
    <a href="{{ route('research.create') }}" class="btn btn-primary">Nueva Investigación</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Autor</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($researches as $research)
                <tr>
                    <td>{{ $research->title }}</td>
                    <td>{{ $research->description }}</td>
                    <td>{{ $research->date }}</td>
                    <td>{{ $research->personalData->first_name }} {{ $research->personalData->last_name }}</td>
                    <td>
                        <a href="{{ route('research.edit', $research->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('research.destroy', $research->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


