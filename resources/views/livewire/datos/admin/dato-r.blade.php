<div class="row">

    <div class="card w-100 ">
        <div class="card-header">
            Dato repetido N°{{$key+1}}
        </div>
        <div class="card-body {{$theme}}">
            <div class="row">
                <div class="col-3">
                    <h4>Dato existente</h4>
                    <ul class="list-group">
                        <li class="list-group-item">{{$repetido['dato']['name']}}</li>
                        <li class="list-group-item">{{$repetido['dato']['email']}}</li>
                        <li class="list-group-item">{{$repetido['dato']['telefono']}}</li>
                        <li class="list-group-item">{{$repetido['dato']['pedido']}}</li>
                        <li class="list-group-item">{{$repetido['dato']['hora_contacto']}}</li>
                        <li class="list-group-item">Cargado el {{date('d-m-Y' ,strtotime($repetido['dato']['created_at']))}}</li>
                        <li class="list-group-item">Ultima actualizacion {{date('d-m-Y' ,strtotime($repetido['dato']['created_at']))}}</li>
                    </ul>
                </div>
                <div class="col-3">
                    <div class="border rounded p-2">
                        <h4>Datos extra:</h4>
                        <p>Pertenece a : {{($repetido['dato']['user_id']) == null ? 'Sin asignar':$repetido['dato']['user']['name']}} </p>
                        <p>Estado: {{$repetido['dato']['case'] == null ? 'Sin asignar':$repetido['dato']['case']}} </p>
                        <p>Comentarios:</p>
                        <ul>   
                            @foreach ($repetido['dato']->comentarios ?? [] as $com)
                                <li>{{$com->comentario}}</li>
                            @endforeach
                        </ul>
                            @if ($repetido['dato']->agenda ?? null != null)
                                <h5>Agendado: </h5>   
                                <p>{{date( 'd-m-Y // H:i',strtotime($repetido['dato']->agenda->fecha))}}</p>
                                <p>{{$repetido['dato']->agenda->anotacion}}</p> 
                                
                            @endif
                    </div>
                </div>
                <div class="col-1 mh-100">
                        <div class="row">

                            <button wire:click="actualizar" class="btn btn-primary btn-block mb-3">Re-cargar</button>
                            <button wire:click="noCargar" class="btn btn-danger btn-block mb-3">No cargar</button>
                            @if ($repetido['dato']['user_id'] != null)
                                
                            <button wire:click="aviso" class="btn btn-success btn-block ">Avisar a {{$repetido['dato']['user']['name'] ?? null}} </button>
                            @endif
                        </div>
                </div>
                <div class="col-5">
                    <h4>Dato nuevo</h4>
                    <ul class="list-group">
                        <li class="list-group-item">{{$repetido['dataNew']['nombre_completo'] ?? 'index-error'}}</li>
                        <li class="list-group-item">{{$repetido['dataNew']['correo_electronico'] ?? 'index-error'}}</li>
                        <li class="list-group-item">{{$repetido['dataNew']['numero_de_telefono'] ?? 'index-error'}}</li>
                        <li class="list-group-item">{{$repetido['dataNew']['campaign_name'] ?? 'index-error'}}</li>
                        <li class="list-group-item">{{$repetido['dataNew']['horario_de_contacto'] ?? 'index-error'}}</li>

                    </ul>
                </div>
            </div>
        </div>

        <div>

        </div>
    </div>
</div>
