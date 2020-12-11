<div>
    <div class="card {{($data->hoy) ? 'bg-primary':'bg-success'}} font-weight-bolder p-2 h-100">
        <p class="mb-1">
            {{$data->name}} <span class="text-white">{{($data->hoy) ? ' - Dato para HOY':''}}</span>
        </p>
        <p class="mb-1">
            {{$data->agenda->anotacion}}
        </p>
        <div class="d-flex justify-content-between">

            <u class="{{($data->hoy) ? 'text-white':'text-dark'}}">{{@date_format($data->agenda->fecha, 'd-m // H:i')}} Hs</u>
            <button type="button" 
                    class="btn {{($data->hoy) ? 'btn-primary':'btn-success'}}" 
                    data-toggle="modal" 
                    data-target="#modal-agenda-{{$data->id}}"
                    
            >
                <i data-toggle="tooltip" data-placement="top" title="Ver mas informacion" class="text-dark fas fa-eye fa-2x"></i>
            </button>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" data-show="true" id="modal-agenda-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: rgba(255,146,10,1)">
                    <h5 class="modal-title font-weight-bolder">Dato agendado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background: rgba(255,146,10,1);
                background: -moz-linear-gradient(top, rgba(255,146,10,1) 0%, rgba(247,217,180,1) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,146,10,1)), color-stop(100%, rgba(247,217,180,1)));
                background: -webkit-linear-gradient(top, rgba(255,146,10,1) 0%, rgba(247,217,180,1) 100%);
                background: -o-linear-gradient(top, rgba(255,146,10,1) 0%, rgba(247,217,180,1) 100%);
                background: -ms-linear-gradient(top, rgba(255,146,10,1) 0%, rgba(247,217,180,1) 100%);
                background: linear-gradient(to bottom, rgba(255,146,10,1) 0%, rgba(247,217,180,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff920a', endColorstr='#f7d9b4', GradientType=0 );">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">

                                    <li class="list-group-item" >{{$data->name}}</li>
                                    <li class="list-group-item" >{{$data->telefono}}</li>
                                    <li class="list-group-item" >{{$data->email}}</li>
                                    <li class="list-group-item" >{{$data->pedido}}</li>
                                </ul>
                                <hr>
                                @livewire('datos.operario.comentario',['dato'=> $data], key($data->id))
                            </div>
                            <div class="col-md-6">
                                <div class="card border border-dark">
                                    <div class="card-header text-white font-weight-bold" style="background-color: #995400">
                                        Cambiar fecha y hora
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('Operario.reAgendar')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <div class="form-group">
                                              <label for="fecha">Fecha: </label>
                                              <input type="datetime-local" class="form-control" name="fecha" id="fecha" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="anotacion">Anotacion: </label>
                                                <input type="text" id="anotacion" class="form-control" name="anotacion" value="{{$data->agenda->anotacion}}" placeholder="Detalle..." >
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Re-Agendar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{route('Operario.putCase',['Dato' => $data, 'case' => 'posible'])}}" class="btn btn-primary mr-3">Posible</a> 
                            <a href="{{route('Operario.putCase',['Dato' => $data, 'case' => 'ni'])}}" class="btn btn-danger mr-3">No interesado</a>        
                            <a href="{{route('Operario.putCase',['Dato' => $data, 'case' => 'vendido'])}}" class="btn btn-success">Vendido</a>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
