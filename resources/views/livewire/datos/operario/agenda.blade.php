<div>
    <div class="row mb-2">

        <button wire:click="refresh" class="rounded-circle btn btn-primary"><img src="/open-iconic/svg/loop-circular.svg" alt="icon name" style="width: 25px"></button>
    </div>
    
    <div class="row">

        @foreach ($agendados as $key => $data)
            <div class="col-md-3 mb-3 mh-100">
                <div class="card mh-100">
                    <div class="card-body bg-success font-weight-bolder p-2">
                        <p class="mb-1">
                            {{$data->name}}
                        </p>
                        <p class="mb-1">
                            {{$data->agenda->anotacion}}
                        </p>
                        <div class="d-flex justify-content-between">

                            <u class="text-white">{{@date_format($data->agenda->fecha, 'd-m // H:i')}} Hs</u>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agenda-{{$data->id}}">
                                Ver
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
           
            
            <!-- Modal -->
            <div class="modal fade" id="modal-agenda-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">{{$data->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>{{$data->telefono}}</p>
                                <p>{{$data->email}}</p>
                                <ul>

                                    @foreach ($data->comentarios as $coment)
                                    <li>{{$coment->comentario}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM
                    
                });
            </script>
        @endforeach
    </div>
</div>
