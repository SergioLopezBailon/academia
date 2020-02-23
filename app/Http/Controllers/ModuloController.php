<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use App\Alumno;
class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alumnos=Alumno::all();
        $modulos = Modulo::orderBy('nombre')
        ->alumno($request->get('alumno_id'))
        ->paginate(3);
        return view('modulos.index',compact('modulos','request','alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'nombre' => ['required','unique:modulos'],
           'horas' => ['required','min:0']
        ]);

        $modulo = new Modulo();
        $modulo->nombre=ucwords($request->nombre);
        $modulo->horas=$request->horas;
        $modulo->save();

        return redirect()->route('modulos.index')->with('mensaje','Modulo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        return view('modulos.detalle',compact('modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        return view('modulos.edit',compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        $request->validate([
            'nombre'=>['required','unique:modulos'],
            'horas'=>['required','min:0']
        ]);

        $modulo->nombre=ucwords($request->nombre);
        $modulo->horas=$request->horas;
        $modulo->save();
        return redirect()->route('modulos.index')->with('mensaje','Modulo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('modulos.index')->with('mensaje','Modulo borrado correctamente');
    }
}
