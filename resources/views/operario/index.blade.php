@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">

        <div class="col-md-3">
            
            <div class="card">
                <div class="card-header">
                    {{$operario->name}}
                </div>
                    
                <ul class="list-group">
                    <li class="list-group-item">{{$operario->email}}</li>
                    <li class="list-group-item"><a href="{{route('Operario.verPosibles')}}">Ir a posibles interesados</a></li>
                    <li class="list-group-item">@livewire('admin.buscador')</li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            @livewire('datos.operario.agenda',['operario'=>$operario])
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">

            @livewire('datos.operario.datos-list',['operario'=>$operario])
        </div>
    </div>
</div>
@endsection