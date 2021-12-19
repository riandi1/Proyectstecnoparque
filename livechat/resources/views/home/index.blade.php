@extends('layouts.app')

@section('contenido')

    <div class="container">

        <h3>chat</h3>

        @livewire('chat-form')

        @livewire('chat-list')

    </div>


@endsection
