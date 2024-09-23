@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Educación</h1>

    <a href="{{ route('education.create') }}" class="btn btn-primary">Agregar Educación</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Institución</th>
                <th>Nivel</th>
                <th>Campo</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Persona</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($education as $edu)
            <tr>
                <td>{{ $edu->institution }}</td>
                <td>{{ $edu->level }}</td>
                <td>{{ $edu->area }}</td>
                <td>{{ $edu->start_date }}</td>
                <td>{{ $edu->end_date ?? 'Presente' }}</td>
                <td>{{ $edu->personalData->first_name }} {{ $edu->personalData->last_name }}</td>
                <td>
                    <a href="{{ route('education.edit', $edu->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('education.destroy', $edu->id) }}" method="POST" style="display:inline;">
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


