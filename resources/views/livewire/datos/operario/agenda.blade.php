<button wire:click="refresh">asd</button>
<div class="row">
    @foreach ($agendados as $key => $data)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success font-weight-bolder">
                    {{$data->name}} - <u>{{var_dump($data->agenda->fecha)}}</u>
                </div>
                {{--
                <div class="card-body">
                    Fecha : {{$data->agenda->fecha}}
                    <hr>
                    {{$data->agenda->anotacion}}
                </div>
                --}}
            </div>
        </div>
    @endforeach
</div>
