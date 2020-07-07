<div class="row">
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
                        <div class="">
                            <button wire:click="putCase({{$key}},'na')" class="btn btn-danger">NA</button>
                            <button data-toggle="collapse" href="#agenda-collapse-{{$dato->id}}" wire:click="showHideCollapse({{$key}})" class="btn btn-success">Agendar</button>
                            <button wire:click="putCase({{$key}},'ni')" class="btn btn-primary">No interesado</button>
                        </div>
                        <div class="collapse {{$stateCollapse[$key] ?? null}} " id="agenda-collapse-{{$dato->id}}">
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

