@extends('layouts.uno')
@section('titulo')
    Inicio
@endsection
@section('cabecera')
    Listado de Libros
@endsection
@section('contenido')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="mb-2 flex flex-row-reverse">
                        <a href="{{ route('libros.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"> Nuevo</i></a>
                    </div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Título</th>
                                <th scope="col" class="px-6 py-4">Descripción</th>
                                <th scope="col" class="px-6 py-4">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($libros as $item)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class=" px-6 py-4">{{ $item->titulo }}</td>
                                    <td class=" px-6 py-4">{{ $item->descripcion }}</td>
                                    <td class=" px-6 py-4">
                                        <form method="POST" action="{{ route('libros.destroy', $item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <a href="{{ route('libros.edit', $item) }}" class="text-yellow-600">
                                                <i class="fas fa-edit"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $libros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (session('info'))
        {
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>}
    @endif
@endsection
