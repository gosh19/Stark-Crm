<div class="nota mb-1">
    <div class="d-flex justify-content-between">
        <h5 class="font-weight-bolder">{{$nota->asunto}}</h5>
        <button data-toggle="collapse" data-target="#txt-nota-{{$nota->id}}" ><i class="fas fa-scroll fa-1x text-white"></i></button>
    </div>
    <div class="collapse" id="txt-nota-{{$nota->id}}" >
        <p>
            {{$nota->mensaje}}
        </p>
        @if ($nota->receiver != null)
            
            <div class="d-flex justify-content-end">
                
                <a href="{{route('Nota.modVisto',['Nota'=>$nota])}}" class="btn btn-warning">Visto {{$nota->visto}} <i class="fas fa-check-double fa-1x"></i> </a>
            </div>
        @endif
        @if (Auth::user()->rol == 'admin')
            <a onclick="javascript: return confirm('Seguro que desea eliminar la nota?')" 
                href="{{route('Nota.delete',['Nota'=>$nota])}}"
                class="btn btn-block btn-danger"
            >Eliminar nota</a>
        @endif
    </div>
</div>