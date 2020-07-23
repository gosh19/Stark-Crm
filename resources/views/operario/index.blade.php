@extends('layouts.app')

@section('content')
<div class="container-fluid pt-3 " style="background: rgba(255,255,255,1);
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(4,24,99,1) 22%, rgba(4,24,99,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(22%, rgba(4,24,99,1)), color-stop(100%, rgba(4,24,99,1)));
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(4,24,99,1) 22%, rgba(4,24,99,1) 100%);
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(4,24,99,1) 22%, rgba(4,24,99,1) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(4,24,99,1) 22%, rgba(4,24,99,1) 100%);
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(4,24,99,1) 22%, rgba(4,24,99,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#041863', GradientType=0 );" >
    <div class="row mb-3">

        <div class="col-md-3">
            
            <div class="card bg-danger">
                <div class="card-header  text-white">
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