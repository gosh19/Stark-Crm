@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-3">
        @foreach ($operarios as $op)
            <div class="col-span-1">
                @livewire('admin.gestion-users.user', ['operario' => $op], key($op->id))
            </div>
        @endforeach
    </div>
@endsection