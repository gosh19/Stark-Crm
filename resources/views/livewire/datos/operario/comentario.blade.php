<div class="form-group">
    <ul>
        @foreach ($comments as $c)
            <p>{{$c->comentario}} - <small class="text-dark">{{date_format($c->created_at,'d-m // H:i')}}</small> </p>
        @endforeach
    </ul>
    <input key="{{$dato->id}}" type="text"
          class="form-control mb-3" wire:model="comentario" wire:keydown.enter="cargarComentario" placeholder="Dejar un comentario..." >
    
</div>
