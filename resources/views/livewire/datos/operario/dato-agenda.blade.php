<div>
    <div class="card mh-100">
        <div class="card-body {{($data->hoy) ? 'bg-primary':'bg-success'}} font-weight-bolder p-2">
            <p class="mb-1">
                {{$data->name}} <span class="text-white">{{($data->hoy) ? ' - Dato para HOY':''}}</span>
            </p>
            <p class="mb-1">
                {{$data->agenda->anotacion}}
            </p>
            <div class="d-flex justify-content-between">

                <u class="{{($data->hoy) ? 'text-white':'text-dark'}}">{{@date_format($data->agenda->fecha, 'd-m // H:i')}} Hs</u>
                <button type="button" 
                        class="btn {{($data->hoy) ? 'btn-success': 'btn-primary'}}" 
                        data-toggle="modal" 
                        data-target="#modal-agenda-{{$data->id}}"
                >
                    Ver
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" data-show="true" id="modal-agenda-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">{{$data->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{$data->telefono}}</p>
                                <p>{{$data->email}}</p>
                                <ul>
                                    @foreach ($data->comentarios as $key => $comment)
                                    <li>{{$comment->comentario}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
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
                        <a href="{{route('Operario.putCase',['Dato' => $data, 'case' => 'ni'])}}" class="btn btn-primary">No interesado</a>        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
