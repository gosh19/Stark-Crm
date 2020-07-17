<div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Buscador</span>
            </div>
            <input wire:model="data" id="data" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <small for="data" class="form-text {{count($result) == 0 ? 'text-muted':'text-primary'}} ">Se encontraron <b> {{count($result)}}</b> dato(s)</small>
    </div>
    <ul class="list-group">

        @foreach ($result as $key => $item)
        <li class="list-group-item">
            <div class="d-flex justify-content-between">

                <p>{{$item->name}}</p>
                <p>{{$item->telefono}}</p>
            </div>
            <p>{{$item->email}}</p>
            <button data-toggle="modal" data-target="#modal-dato-{{$item->id}}" class="btn btn-block btn-primary">Ver</button>
            <div class="modal fade" id="modal-dato-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Informacion del dato</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{$item->name}}</p>
                                    <p>{{$item->telefono}}</p>
                                    <p>{{$item->email}}</p>
                                    <p>{{$item->pedido}}</p>
                                    <p>{{$item->hora_contacto}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{($item->user_id == null)? 'No pertenece a nadie aun':'Pertenece a '.$item->user->name }}</p>
                                    <h5>{{count($item->comentarios)==0 ? '':"Comentarios"}}</h5>
                                    <ul>
                                        @foreach ($item->comentarios as $key => $comment)
                                            <li>{{$comment->comentario}}</li>
                                        @endforeach
                                    </ul>
                                    <form action="{{ route('Dato.changeOP',['Dato'=> $item]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id">
                                        <select name="user_id" id=""  class="custom-select custom-select-lg mb-3">
                                            <option value="">Selecciona...</option>
                                            @foreach ($operarios as $key => $op)
                                                <option value="{{$op->id}}">{{$op->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="submit" class="btn btn-block btn-success" value="Agregar">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
        </li>
        @endforeach
    </ul>
</div>
