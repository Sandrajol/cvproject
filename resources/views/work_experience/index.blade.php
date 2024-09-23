@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Experiencias Laborales</h1>
    <a href="{{ route('work_experience.create') }}" class="btn btn-primary">Nueva Experiencia</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Compañía</th>
                <th>Posición</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Empleado</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($workExperiences as $workExperience)
                <tr>
                    <td>{{ $workExperience->company }}</td>
                    <td>{{ $workExperience->position }}</td>
                    <td>{{ $workExperience->start_date }}</td>
                    <td>{{ $workExperience->end_date ?? 'Actual' }}</td>
                    <td>{{ $workExperience->personalData->first_name }} {{ $workExperience->personalData->last_name }}</td>
                    <td>
                        <a href="{{ route('work_experience.edit', $workExperience->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('work_experience.destroy', $workExperience->id) }}" method="POST" style="display:inline-block;">
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



