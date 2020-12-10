<div class="form-group">
    <div class="p-2 rounded mb-3" style="boder:2px solid black; background-color: rgba(31, 51, 107, 0.466);">
        @foreach ($comments as $c)
            
            <p>
                {{$c->comentario}} - 
                <small class="text-white">{{date_format($c->created_at,'d-m // H:i')}}</small> - 
                {{(Auth::user()->id == $c->user_id)? 'Yo': $c->user->name}}
            </p>
        @endforeach
    </div>
    <input key="{{$dato->id}}" type="text"
          class="form-control mb-3" wire:model="comentario" wire:keydown.enter="cargarComentario" placeholder="Dejar un comentario..." >
    
</div>
