<div>
    <h4>Hay {{count($selec)}} datos seleccionados</h4>
    @if (count($selec) != 0)
        <button wire:click="delete" class="btn btn-danger mb-3" >Eliminar</button>
    @endif

    <div class="d-flex justify-content-around mb-3">
        @foreach ($operarios as $op)
            <button class="btn btn-primary" wire:click="pasarDatos({{$op->id}})">{{$op->name}}</button>
        @endforeach
    </div>

    <table class="table table-hover">
        <thead>
            <tr style="cursor: pointer">
                <th><button class="btn btn-info" wire:click="sortBy('id')">Id</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('pedido')">Curso</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('name')">Nombre</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('email')">E-mail</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('telefono')">Telefono</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('hora_contacto')">Horario</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('updated_at')">Fecha dato</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $key => $dato)
                <tr id="row-dato-{{$dato->id}}" 
                    style="cursor:pointer" 
                    onclick="checkData({{$dato->id}})"
                    wire:click="submit({{$dato}})"
                    class="{{(isset($selec[$dato->id])) ? 'bg-success':''}}"
                    >
                    <td scope="row">{{$dato->id}}</td>
                    <td>{{$dato->pedido}}</td>
                    <td>{{$dato->name}}</td>
                    <td>{{$dato->email}}</td>
                    <td>{{$dato->telefono}}</td>
                    <td>{{$dato->hora_contacto}}</td>
                    <td>{{date_format($dato->updated_at, 'd-m-Y H:i')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
