<div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Buscador</span>
            </div>
            <input wire:model="data" id="data" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <small for="data" class="form-text {{count($result) == 0 ? 'text-muted':'text-primary'}} ">Se encontraron <b> {{count($result)}}</b> dato(s)</small>
        @if ((count($result) == 0) && (Auth::user()->rol == 'admin'))
        <button data-toggle="modal" data-target="#modal-dato-nuevo" class="btn btn-block btn-primary">Cargar nuevo dato</button>
            <div class="modal fade" id="modal-dato-nuevo" tabindex="-1" role="dialog" aria-labelledby="modalDatoNuevo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalDatoNuevo">Carga de dato nuevo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('Dato.newDato')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Correo electronico...">
                            </div>
                            <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" class="form-control" name="name" id="nombre" placeholder="Nombre...">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" value="{{$telefono}}" name="telefono" id="telefono" placeholder="Telefono...">
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class="form-group mr-3">
                                    <label for="hora_contacto">Hora contacto</label>
                                    <input type="text" class="form-control" name="hora_contacto" id="hora_contacto" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="operario">Operario/a</label>
                                    <select name="user_id" id="operario"  class="custom-select custom-select-lg">
                                        <option value="">Selecciona...</option>
                                        @foreach ($operarios as $key => $op)
                                            <option value="{{$op->id}}">{{$op->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pedido">Curso</label>
                                <input type="text" class="form-control" name="pedido" id="pedido" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Cargar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        @endif
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
                                    @if (Auth::user()->rol == 'admin')
                                        
                                    
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

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        </li>
        @endforeach
    </ul>
</div>
