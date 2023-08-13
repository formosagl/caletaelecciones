<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;

class MesasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::orderBy('escuelas_nombre')->get();

        return view('mesas.index', compact('escuelas'));
    }

    public function create()
    {

    }

    public function cargar(Request $request)
    {

        // AGREGAR VALIDACION SI YA FUE CARGADA LA MESA

        if ($escuelas = Escuela::findOrFail($request->escuela)) {
            $mesas = $request->mesa;

        } else {
            return back()->with('error', 'Ocurrió un error seleccionando la escuela.');
        }

        return view('mesas.create', compact('escuelas','mesas'));
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
