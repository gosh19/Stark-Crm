<div class="row">
    <button wire:click="refresh" class="rounded-circle btn btn-primary"><img src="/open-iconic/svg/loop-circular.svg" alt="icon name" style="width: 25px"></button>

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="pl-1">Id</th>
                <th>Curso</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Telefono</th>
                <th>Horario</th>
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
                    <td class="pr-1">{{$dato->name}}</td>
                    <td class="pr-1">{{$dato->email}}</td>
                    <td>{{$dato->telefono}}</td>
                    <td class="pr-1">{{$dato->hora_contacto}}</td>

                    <td style="width: 400px">
                        <div class="row justify-content-around mb-3">
                            <button wire:click="putCase({{$key}},'na')" class="btn btn-danger">NA</button>
                            <button wire:click="showHideCollapse({{$key}})" data-toggle="collapse" href="#agenda-collapse-{{$dato->id}}" class="btn btn-success">Agendar</button>
                            <button wire:click="putCase({{$key}},'posible')" class="btn btn-warning">Posible</button>
                            
                        </div>
                        <div class="row justify-content-around">
                            <button wire:click="putCase({{$key}},'ni')" class="btn btn-primary">No interesado</button>
                            <button wire:click="putCase({{$key}},'vendido')" class="btn btn-success">Vendido</button>
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
                        @livewire('datos.operario.comentario',['dato'=> $dato], key($dato->id))
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

