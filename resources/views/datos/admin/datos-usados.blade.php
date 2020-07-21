@extends('layouts.app')

@section('content')
<div class="alert alert-success">
    <h3>Historial de datos</h3>
    <p>
        Aqui podras ver todos los datos y como fueron cargados. Recuerda q los datos <b>agendados</b> que aun no tienen un 
        estado no se veran aqui hasta que se les asigne un estado.
    </p>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="pr-0"><a href="{{route('Dato.usados',['col'=> 'id','order'=>$order])}}">Id</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'pedido','order'=>$order])}}">Curso</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'name','order'=>$order])}}">Nombre</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'email','order'=>$order])}}">E-mail</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'telefono','order'=>$order])}}">Telefono</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'hora_contacto','order'=>$order])}}">Horario</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'updated_at','order'=>$order])}}">Ultima act.</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'case','order'=>$order])}}">Estado</a></th>
                <th><a href="{{route('Dato.usados',['col'=> 'user_id','order'=>$order])}}">Op</a></th>
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