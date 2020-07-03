<div class="form-group">
    <ul>
        @foreach ($comments as $c)
            <p>{{$c->comentario}} - <small class="text-info">{{date_format($c->created_at,'d-m // H:i')}}</small> </p>
        @endforeach
    </ul>
    <input type="text"
          class="form-control" wire:model="comentario" wire:keydown.enter="cargarComentario" >
</div>
