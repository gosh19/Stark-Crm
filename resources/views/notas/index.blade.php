@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="">

            <h1>Notas generales</h1>
        </div>
        <hr>
        <div class="row mb-3">
            @if (count($notasGen) == 0)
                <div class="w-100 alert alert-danger m-3">
                    <p>No hay notas para ver</p>
                </div>
            @else
                @foreach ($notasGen as $nota)
                    <div class="col-md-3">
                        @include('layouts.nota',['nota'=> $nota])
                    </div>
                @endforeach
            @endif
            
        </div>
        <hr>
        <h1>Notas personales</h1>
        <hr>
        <div class="row">
            @if (count($notasOp) == 0)
                <div class="w-100 alert alert-danger m-3">
                    <p>No hay notas para ver</p>
                </div>
            @else
                @foreach ($notasOp as $nota)
                    <div class="col-md-3">
                        @include('layouts.nota',['nota'=> $nota])
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
@endsection