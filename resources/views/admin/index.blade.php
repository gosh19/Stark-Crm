@extends('layouts.app')

@section('content')
    @if (session()->has('datosNuevos'))
    <div id="avisoDatosCargados" class="alert alert-success w-100">
        <p>Se cargaron {{session('datosNuevos')}} datos nuevos</p>
        
    </div>
    @endif
    @if (session()->has('datosRepetidos'))
    <div id="avisoDatosCargados" class="alert alert-danger w-100">
        <p>Habia {{session('datosRepetidos')}} datos repetidos </p>
        
    </div>

    <script>
        setTimeout(function(){
            $("#avisoDatosCargados").fadeOut('slow');
        }, 2000)
    </script>
        
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Caja principal
                    </div>
                    <div class="card-body">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Operarios
                    </div>
                    <ul class="list-group">
                        @foreach ($operarios as $operario)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">

                                    <p>{{$operario->name}}</p>
                                    - 
                                    <p>Tiene {{count($operario->datosNuevos())}} dato(s) para llamar</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">

                <div class="card border-primary">
                    <div class="card-header">
                        Funciones
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a data-toggle="collapse" href="#form-carga-csv">Subir CSV</a></li>
                        <li class="list-group-item"><a data-toggle="collapse" href="#form-create-user">Crear usuario</a></li>
                        <li class="list-group-item"><a href="{{route('Dato.index')}}">Ir a datos</a></li>
                    </ul>
                    <div class="collapse m-2" id="form-carga-csv">
                        @include('excel.import')
                    </div>
                    <div class="collapse m-3" id="form-create-user">
                        @livewire('form-create-user')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection