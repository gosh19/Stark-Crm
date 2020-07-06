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

                    <td style="max-width: 300px">
                        <div class="">
                            <button wire:click="putCase({{$key}},'na')" class="btn btn-danger">NA</button>
                            <button class="btn btn-success">Agendar</button>
                            <button wire:click="putCase({{$key}},'ni')" class="btn btn-primary">No interesado</button>
                        </div>
                        @livewire('datos.operario.comentario',['dato'=> $dato], key($dato->id))
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    window.livewire.on('postAddedd', function() {
        console.log('weaaa');
        
        alert('A post was added with the id of: ');
    })
</script>
