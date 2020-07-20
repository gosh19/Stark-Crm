<div class="row">
    <button wire:click="refresh" class="rounded-circle btn btn-primary"><img src="/open-iconic/svg/loop-circular.svg" alt="icon name" style="width: 25px"></button>

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
                        </ul>
                    </td>
                    <td class="pr-1">@livewire('datos.operario.comentario',['dato'=> $dato], key($dato->id))</td>

                    <td style="width: 400px">
                        <div class="d-flex">

                            <select name="" id="" wire:change="selectCase($event.target.value)" class="custom-select custom-select-lg mb-3">
                                <option value="">Selecciona una opcion</option>
                                <option value="na">No atiende</option>
                                <option value="ni">No interesado</option>
                                <option value="posible">Posible interesado</option>
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

