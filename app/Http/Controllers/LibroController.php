<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::orderBy('id','desc')->paginate(5);
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required','string','min:3','unique:libros,titulo'],
            'descripcion'=>['required','string', 'min:10']
        ]);
        Libro::create($request->all());
        return redirect()->route('libros.index')->with('info','Libro Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.editar', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'=>['required','string','min:3','unique:libros,titulo,'.$libro->id],
            'descripcion'=>['required','string', 'min:10']
        ]);
        $libro->update($request->all());
        return redirect()->route('libros.index')->with('info','Libro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('info','Libro Borrado');
    }
}
