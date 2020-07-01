@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @livewire('datos.admin.datos-list',['datos'=> $datos])
    </div>
@endsection