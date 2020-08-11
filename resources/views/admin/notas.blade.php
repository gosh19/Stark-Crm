<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#notasModal">
        Notas
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="notasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gestion de notas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Ultimas Notas</h1>
                            @foreach ($notas as $nota)
                                @include('layouts.nota',['nota'=> $nota])
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <h3>Crear nota</h3>
                                <hr>
                                <form action="{{route('Nota.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Asunto</label>
                                        <input type="text" name="asunto" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Mensaje</label>
                                        <textarea class="form-control" name="mensaje" rows="3"></textarea>
                                    </div>
                                    <select name="id" class="form-control">
                                        <option value="{{null}}">General</option>
                                        @foreach ($operarios as $op)
                                            <option value="{{$op->id}}" >{{$op->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                    <input type="submit" value="Crear" class="btn btn-warning btn-block mt-3">
                                </form>
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
</div>