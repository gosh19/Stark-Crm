<div>
    <div class="row mb-2">

        <button wire:click="refresh" class="rounded-circle btn btn-primary"><i class="fas fa-redo fa-1x"></i></button>
        <a class="ml-3 btn btn-info text-white font-weight-bolder" href="{{route('Operario.agenda')}}"><i class="fas fa-calendar-alt"></i> Ir a la agenda</a>
    </div>
    <div class="row">
        
        @foreach ($agendados as $key => $data)
            <div class="col-md-3 mb-3 mh-100">
                @livewire('datos.operario.dato-agenda',['data'=> $data], key($data['id']))
            </div>           
        @endforeach
    </div>
</div>
