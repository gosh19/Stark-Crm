<div>
    <div class="row mb-2">

        <button wire:click="refresh" class="rounded-circle btn btn-primary"><img src="/open-iconic/svg/loop-circular.svg" alt="icon name" style="width: 25px"></button>
        <a class="ml-3" href="{{route('Operario.agenda')}}">Ir a la agenda</a>
    </div>
    <div class="row">
        
        @foreach ($agendados as $key => $data)
            <div class="col-md-3 mb-3 mh-100">
                @livewire('datos.operario.dato-agenda',['data'=> $data], key($data['id']))
            </div>           
        @endforeach
    </div>
</div>
