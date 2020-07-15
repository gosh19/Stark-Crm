<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container">
        @foreach ($repetidos as $key => $repetido)
        <div class="row mb-3">

            @livewire('datos.admin.dato-r',['key'=> $key, 'repetido' => $repetido])
        </div>
        
        @endforeach

    </div>
</div>
