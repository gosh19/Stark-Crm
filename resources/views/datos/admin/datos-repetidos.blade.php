@extends('layouts.app')

@section('content')
<a class="btn btn-danger" href="/">Terminar</a>
    @livewire('datos.admin.datos-repetidos',['repetidos'=>$repetidos])
    <a class="btn btn-danger" href="/">Terminar</a>
@endsection