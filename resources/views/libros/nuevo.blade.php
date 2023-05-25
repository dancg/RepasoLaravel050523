@extends('layouts.uno')
@section('titulo')
    Nuevo
@endsection
@section('cabecera')
    Nuevo Libro
@endsection
@section('contenido')
    <div class="w-full mx-auto max-w-xs">
        <form method="POST" action="{{ route('libros.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                    Título del Libro
                </label>
                <input value="{{ @old('titulo') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="titulo" type="text" name="titulo" placeholder="Titulo...">
                @error('titulo')
                    <p class="text-red-700 italic text-xs">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                    Descripción del Libro
                </label>
                <textarea name="descripcion" id="descripcion" rows="4">{{ @old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-700 italic text-xs">***{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row-reverse">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    <i class="fas fa-save"></i>Guardar
                </button>
                <a href="{{ route('libros.index') }}"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <i class="fas fa-xmark"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
@section('js')
@endsection
