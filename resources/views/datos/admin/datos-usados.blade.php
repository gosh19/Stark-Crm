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
                <th>---</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{route('Dato.pasarUsado')}}" method="post">
                <div class="border border-primary rounded p-3 m-3">
                    @if ($errors->has('id'))
                        
                        <div class="alert alert-danger">
                            <p>Debe seleccionar al menos un operario</p>
                        </div>
                    @endif
                    <div class="d-flex justify-content-around m-3">
                        @foreach ($operarios as $op)
                        <div class="input-group">
                            <div class="input-group-prepend mr-3">
                            <div class="input-group-text">
                                <input name="id" type="radio" value="{{$op->id}}">
                            </div>
                            </div>
                            <label for="">{{$op->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center w-100 mb-3">
                        <input type="submit" value="Cargar" class="btn btn-success">
                    </div>
                </div>
                @csrf
           
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
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="dato[{{$key}}]" value="{{$dato->id}}">
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </form>
        </tbody>
    </table>
@endsection