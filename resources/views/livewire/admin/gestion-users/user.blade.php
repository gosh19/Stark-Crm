<div x-data="{open: false}" class="p-2 m-2 border-2 border-gray-600">
    <div class="flex justify-between">
        <p>{{$operario->name}}</p>
        <div>

            <i x-on:click="open=!open" class="fas fa-pen fas-2x mr-3 cursor-pointer"></i>
            <a href="{{route('Operario.deleteOp',['operario'=> $operario])}}" onclick="javascript:return confirm('Segturo que quiere eliminar a {{$operario->name}}?')" ><i class="fas fa-trash-alt fas-2x"></i></a>
        </div>
    </div>
    <div x-show="open" class="absolute">
        <div class="p-3 pt-4 bg-gray-200 shadow-2xl rounded">
            <i x-on:click="open=false" class="fas fa-times  absolute top-1 right-2 text-red-600 cursor-pointer"></i>
            <input class="border-2 border-teal-400 p-2 mr-2" wire:model="name" type="text">
            <button wire:click="edit" class="p-2 bg-blue-700 text-white">Editar</button>
        </div>
    </div>

</div>
