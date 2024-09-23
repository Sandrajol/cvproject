@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="title">
        <h1>FUNDACIÓN UNIVERSITARIA DE POPAYÁN</h1>
    </div>
    
     
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sección 1</div>
                    <div class="card-body">
                        <p>Aquí puedes agregar contenido personalizado para la primera sección.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sección 2</div>
                    <div class="card-body">
                        <p>Otra sección personalizada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
