@extends('layouts.uno')
@section('titulo')
Inicio
@endsection
@section('cabecera')
Página Inicial
@endsection
@section('contenido')
<a href="{{route('libros.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
<i class="fas fa-forward"> Ir a Listado de Libros</i></a>
@endsection
@section('js')
@endsection