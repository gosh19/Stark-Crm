<div class="row">
    <div class="d-flex justify-content-between">
        <div class="d-block">
            <button data-toggle="tooltip" data-placement="top" title="Recargar tabla de datos" wire:click="refresh" class="rounded-circle btn btn-primary m-2">
                <i class="fas fa-redo fa-1x"></i>
            </button>
        </div>
        <div class="p-2">
            @if ($theme == 'dark')
                
            <button data-toggle="tooltip" data-placement="left" title="Cambio de color" wire:click="changeTheme('light')" class="bg-light btn"><i class="fas fa-sun"></i></button>
            @else
                
            <button data-toggle="tooltip" data-placement="left" title="Cambio de color" wire:click="changeTheme('dark')" class="bg-light btn"><i class="fas fa-moon"></i></button>
            @endif
        </div>
    </div>

    <table class="table table-{{$theme}}  table-hover table-striped">
        <thead style="background-color: rgb(4, 26, 99);color:#FFF;">
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
                        <ul class="list-group text-dark border border-dark">
                            <li class="list-group-item">{{$dato->email}}</li>
                            <li class="list-group-item">{{$dato->hora_contacto}}</li>
                        </ul>
                    </td>
                    <td style="width: 300px" class="pr-1">@livewire('datos.operario.comentario',['dato'=> $dato], key($dato->id))</td>

                    <td style="width: 300px">
                        <div class="d-flex">

                            <select name="" id="" wire:change="selectCase($event.target.value)" class="custom-select custom-select-lg mb-3">
                                <option value="{{NULL}}">Selecciona una opcion</option>
                                <option value="na">No atiende</option>
                                <option value="ni">No interesado</option>
                                <option value="posible">Posible interesado</option>
                                <option value="cambio_turno">Pasar de turno</option>
                                <option value="vendido">Vendido</option>
                            </select>
                            <button wire:click="putCase({{$key}})" class="btn btn-primary ml-2">Cargar</button>
                        </div>
                        <hr>
                        <div class="row justify-content-around mb-3">
                            <button wire:click="showHideCollapse({{$key}})" data-toggle="collapse" href="#agenda-collapse-{{$dato->id}}" class="btn btn-success">Presione para agendar</button>                            
                        </div>
                        <div class="collapse mt-3 {{$stateCollapse[$key] ?? null}} " id="agenda-collapse-{{$dato->id}}">
                            <div class="card">
                                <div class="card-body">
                                    <input class="mb-3" type="datetime-local" wire:model="fecha" >
                                    <input class="mb-3" type="text" wire:model.lazy="anotacion" placeholder="Detalle..." >
                                    <button wire:click="agendarDato({{$key}})" class="btn btn-success">Agendar</button>
                                </div>
                            </div>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

