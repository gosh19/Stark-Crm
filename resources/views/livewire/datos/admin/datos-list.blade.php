<div>
    <h1>{{var_dump($debug)}}</h1>
    <h1>{{var_dump($selec)}}</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
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
                    style="cursor:pointer" 
                    onclick="checkData({{$dato->id}})"
                    wire:click="submit({{$dato}})"
                    >
                    <td scope="row">{{$dato->id}}</td>
                    <td>{{$dato->pedido}}</td>
                    <td>{{$dato->name}}</td>
                    <td>{{$dato->email}}</td>
                    <td>{{$dato->telefono}}</td>
                    <td>{{$dato->hora_contacto}}</td>
                    <td>
                        <form >
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="dato[{{$key}}]" id="dato-{{$dato->id}}" value="{{$dato->id}}" onclick="checkData({{$dato->id}})" >
                            </label>
                        </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const checkData = (id) => {
        document.getElementById('dato-'+id).checked = !document.getElementById('dato-'+id).checked;
        if ( $('#row-dato-'+id).hasClass('bg-success') ){
            $('#row-dato-'+id).removeClass('bg-success');
        }else{
            $('#row-dato-'+id).addClass('bg-success');
        }
    }
</script>
