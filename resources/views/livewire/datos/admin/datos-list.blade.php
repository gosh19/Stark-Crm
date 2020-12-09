<div>
  <div x-data="{open: false}" class="fixed w-100 z-30">
    <div x-show="open" class="absolute w-100  bg-black bg-opacity-40 py-5">
      <div class="bg-red-600 w-1/2 mx-auto py-3">
        asdasdasdasdas
      </div>
    </div>
  </div>
    <div class="d-flex justify-content-between">

        <h4 class="{{count($selec) == 0? 'p-2 alert alert-danger':'p-2 alert alert-info'}}">{{count($selec)}} dato(s) seleccionados</h4>
        <h4 class="text-right 
                    {{count($datos) > 10? 'p-2 alert alert-primary':'p-2 alert alert-danger'}} "
            >Quedan {{count($datos)}} dato(s)</h4>
    </div>
    
    @if (count($selec) != 0 || true)
    <div class="d-flex justify-content-between m-3">
        <div class="row p-2 border rounded">
            <div class="input-group col-3">
                <div class="input-group-prepend mr-3">
                  <div class="input-group-text">
                    <input type="radio" name="horario" wire:click="setHorario('10:00hs_a_12:00hs')" checked>
                  </div>
                </div>
                <label for="">10:00hs_a_12:00hs</label>
            </div>
            <div class="input-group col-3">
                <div class="input-group-prepend mr-3">
                  <div class="input-group-text">
                    <input type="radio" name="horario" wire:click="setHorario('12:00hs_a_14:00hs')">
                  </div>
                </div>
                <label for="">12:00hs_a_14:00hs</label>
            </div>
            <div class="input-group col-3">
                <div class="input-group-prepend mr-3">
                  <div class="input-group-text">
                    <input type="radio" name="horario" wire:click="setHorario('14:00hs_a_16:00hs')">
                  </div>
                </div>
                <label for="">14:00hs_a_16:00hs</label>
            </div>
            <div class="input-group col-3">
                <div class="input-group-prepend mr-3">
                  <div class="input-group-text">
                    <input type="radio" name="horario" wire:click="setHorario('16:00hs_a_18:00hs')">
                  </div>
                </div>
                <label for="">16:00hs_a_18:00hs</label>
            </div>
            <button wire:click="modificarHorario" {{$disabled}} class="btn btn-warning btn-block m-3" >Modificar</button>
        </div>
        <button wire:click="delete" 
                data-toggle="tooltip" 
                data-placement="left" 
                {{$disabled}}
                title="EL DATO SE ELIMINARA DE LA BASE!!" 
                class="btn btn-danger mb-3 mr-3" 
        >Eliminar</button>
    </div>
    @endif

    <div class="d-flex justify-content-around mb-3">
        @foreach ($operarios as $op)
            <button class="btn btn-primary" wire:click="pasarDatos({{$op->id}})">{{$op->name}}</button>
        @endforeach
    </div>
    <div>
      <p class="text-blue-600 text-xl font-bold">Filtro <i class="fas fa-filter"></i></p>
      <div class="border border-blue-300 p-3 flex justify-content-between">
        <div>
          <label for="">Estado : </label>
          <select class="border-2 border-blue-400" wire:model="case">
            <option value="{{null}}">Sin estado</option>
            <option value="na">No antiende</option>
            <option value="ni">No interesado</option>
            <option value="posible">Posible</option>
          </select>
        </div>
        <div>
          <label for="">Desde : </label>
          <input class="p-1 border-blue-400 border-2 " type="date" wire:model="fechaDesde">
        </div>
        <div>
          <label for="">Hasta : </label>
          <input class="p-1 border-blue-400 border-2 " type="date" wire:model="fechaHasta">
        </div>
        <div>
          <button class="py-1 px-5 rounded bg-blue-500 text-white" wire:click="searchData()">
            Filtrar
          </button>
        </div>
      </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr style="cursor: pointer">
                <th><button class="btn btn-info" wire:click="sortBy('pedido')">Curso</button> </th>
                <th><button class="btn btn-info" >Origen</button></th>
                <th><button class="btn btn-info" wire:click="sortBy('name')">Nombre</button> </th>
                <th><button class="btn btn-info" wire:click="sortBy('hora_contacto')">Horario</button> </th>
                <th><button class="btn btn-info" >Usos</button></th>
                <th><button class="btn btn-info" wire:click="sortBy('updated_at')">Fecha dato</button></th>
                <th><button class="btn btn-info" >Operario</button></th>
                <th><button class="btn btn-info" >Action</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $key => $dato)
                <tr id="row-dato-{{$dato->id}}" 
                    style="cursor:pointer" 
                    onclick="checkData({{$dato->id}})"
                    wire:click="submit({{$dato}})"
                    class="{{(isset($selec[$dato->id])) ? 'bg-success':''}}"
                    >
                    <td>{{$dato->pedido}}</td>
                    <td>{{$dato->platform}}</td>
                    <td>{{$dato->name}}</td>
                    <td>{{$dato->hora_contacto}}</td>
                    <td>{{count($dato->historial)}}</td>
                    <td>{{date_format($dato->updated_at, 'd-m-Y H:i')}}</td>
                    <td>{{$dato->user_id == null ? 'Sin asignar':$dato->user->name}}</td>
                    <td><button class="py-1 px-2 bg-green-400">Ver detalle</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
