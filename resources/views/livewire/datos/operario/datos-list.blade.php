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
                <th>Action</th>
                <th>---</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $key => $dato)
                <tr id="row-dato-{{$dato->id}}" 
                    style="cursor:pointer" 
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
                    <td class="pr-1">
                        <button class="btn btn-danger">NA</button>
                        <br>
                        <button class="btn btn-success">Oportunidad</button>
                        <br>
                        <button class="btn btn-primary">No interesado</button>
                    </td>
                    <td style="max-width: 300px">
                        @livewire('datos.operario.comentario',['dato'=> $dato])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
