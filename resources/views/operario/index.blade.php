@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">

        <div class="col-md-3">
            
            <div class="card">
                <div class="card-header">
                    {{$user->name}}
                </div>
                <div class="card-body">
                    {{$user->email}}
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">

            @livewire('datos.operario.datos-list',[])
        </div>
    </div>
</div>
@endsection