@extends('layouts.app')

@section('content')
    @livewire('datos.admin.datos-repetidos',['repetidos'=>$repetidos])

@endsection