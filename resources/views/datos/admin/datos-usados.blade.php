@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around mb-3">
    <a class="btn btn-primary" href="{{route('Dato.usados')}}">Ver todos</a>
    <a class="btn btn-danger" href="{{route('Dato.usados',['case'=>'na'])}}">Ver na</a>
    <a class="btn btn-warning" href="{{route('Dato.usados',['case'=>'ni'])}}">Ver no interesados</a>
    <a class="btn btn-info" href="{{route('Dato.usados',['case'=>'posible'])}}">Ver posibles</a>
    <a class="btn btn-success" href="{{route('Dato.usados',['case'=>'vendido'])}}">Ver vendidos</a>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="pr-0">Id</th>
                <th>Curso</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Telefono</th>
                <th>Horario</th>
                <th>---</th>
                <th>Estado</th>
                <th>Op</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $key => $dato)
                @php
                    $theme = null;
                    switch ($dato->case) {
                        case 'na':
                            $theme = 'bg-danger';
                            break;
                        case 'posible':
                            $theme = 'bg-info';
                            break;
                        case 'vendido':
                            $theme = 'bg-success';
                            break;
                        case 'ni':
                            $theme = 'bg-warning';
                            break;
                        default:
                            # code...
                            break;
                    }
                @endphp
                <tr id="row-dato-{{$dato->id}}" 
                    style="cursor:pointer" 
                    wire:click="submit({{$dato}})"
                    class="{{$theme}}"
                    >
                    <td scope="row" class="pr-0">{{$dato->id}}</td>
                    <td>{{$dato->pedido}}</td>
                    <td>{{$dato->name}}</td>
                    <td>{{$dato->email}}</td>
                    <td>{{$dato->telefono}}</td>
                    <td>{{$dato->hora_contacto}}</td>
                    <td>{{date_format($dato->updated_at, 'd-m-Y H:i')}}</td>
                    <td>{{$dato->case}}</td>
                    <td>{{$dato->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection