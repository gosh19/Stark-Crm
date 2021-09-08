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
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header degree-bluegray font-weight-bolder">
                        Caja principal
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            @include('admin.notas',['operarios' => $operarios, 'notas' => $notas])
                        </div>
                        @livewire('admin.buscador',['operarios'=> $operarios])
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header degree-bluegray font-weight-bolder">
                        Operarios
                    </div>
                    <ul class="list-group">
                        @foreach ($operarios as $operario)
                            <li class="list-group-item {{count($operario->datosNuevos()) < 5 ? 'bg-danger text-white':'bg-success'}} ">
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

                <div class="card border-primary mb-3">
                    <div class="card-header degree-bluegray font-weight-bolder">
                        Funciones
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a data-toggle="collapse" href="#form-carga-csv">Subir CSV</a></li>
                        <li class="list-group-item"><a data-toggle="collapse" href="#form-create-user">Crear usuario</a></li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">

                                    <a href="{{route('Dato.index')}}">Ir a datos nuevos</a>
                                </div>
                                <div class="col">
                                    
                                    <a href="{{route('Dato.usados')}}">Ir a datos usados</a>
                                </div>
                                <div class="col">
                                    
                                    <a href="{{route('Dato.mailView')}}">Panel de mail</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="collapse m-2" id="form-carga-csv">
                        @include('excel.import')
                    </div>
                    <div class="collapse m-3" id="form-create-user">
                        @livewire('form-create-user')
                    </div>
                </div>

                <div class="p-3 border border-dark rounded degree-gray mb-3" >
                    {!! $chart->container() !!}
 
                    <script src="{{ $chart->cdn() }}"></script>
                
                    {{ $chart->script() }}
                </div>

                <div class="p-3 border border-dark rounded degree-gray mb-3" >
                    {!! $OpChart->container() !!}
 
                    <script src="{{ $OpChart->cdn() }}"></script>
                
                    {{ $OpChart->script() }}
                </div>
            </div>
        </div>
    </div>
@endsection