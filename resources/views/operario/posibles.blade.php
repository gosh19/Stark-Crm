@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <h3>Posibles interesados</h3>
    <p>Aqui podra ver todos los datos que sean posibles interesados, puedes dejar nuevas notas o agendarlos.</p>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="pl-1">Id</th>
            <th>Curso</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Email/Hs</th>
            <th>Comentarios</th>
            <th>---</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $key => $dato)
            <tr id="row-dato-{{$dato->id}}" 
                class="
                        {{(isset($selec[$dato->id])) ? 'bg-success':''}}
                        {{(count($dato->comentarios) != 0) ? 'bg-info text-white':''}}
                        "
                >
                <td class="pl-1 pr-1" scope="row">{{$dato->id}}</td>
                <td>{{$dato->pedido}}</td>
                <td class="pr-1 {{($dato->notification) ? 'bg-success':''}} ">{{$dato->name}} <br>{{($dato->notification) ? 'Volvio a dejar la consulta':''}}</td>
                <td class="pr-1">{{$dato->telefono}}</td>
                <td>
                    <ul class="list-group text-dark">
                        <li class="list-group-item">{{$dato->email}}</li>
                        <li class="list-group-item">{{$dato->hora_contacto}}</li>
                        @if ($dato->agenda != null)
                            <li class="list-group-item">
                                <h5>Agendado para el </h5>
                                {{date('d-m-Y H:i',strtotime($dato->agenda->fecha))}} <br>
                                {{$dato->agenda->anotacion}}
                            </li>
                        @endif
                    </ul>
                </td>
                <td class="pr-1">@livewire('datos.operario.comentario',['dato'=> $dato], key($dato->id))</td>

                <td style="width: 400px">
                    <form action="{{route('Operario.putCase',['Dato' => $dato])}}" method="post">
                        @csrf
                        <div class="d-flex">

                            <select name="case" id="" wire:change="selectCase($event.target.value)" class="custom-select custom-select-lg mb-3">
                                <option value="">Selecciona una opcion</option>
                                <option value="na">No atiende</option>
                                <option value="ni">No interesado</option>
                                <option value="posible">Posible interesado</option>
                                <option value="vendido">Vendido</option>
                            </select>
                            <button type="submit" class="btn btn-primary ml-2">Cargar</button>
                        </div>
                    </form>
                    <hr>
                    <div class="row justify-content-around mb-3">
                        <button wire:click="showHideCollapse({{$key}})" data-toggle="collapse" href="#agenda-collapse-{{$dato->id}}" class="btn btn-success">Presione para agendar</button>                            
                    </div>
                    <div class="collapse mt-3 {{$stateCollapse[$key] ?? null}} " id="agenda-collapse-{{$dato->id}}">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('Operario.reAgendar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$dato->id}}">
                                    <input class="mb-3" type="datetime-local" name="fecha" >
                                    <input class="mb-3" type="text" name="anotacion" placeholder="Detalle..." >
                                    <button type="submit" class="btn btn-success">Agendar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection