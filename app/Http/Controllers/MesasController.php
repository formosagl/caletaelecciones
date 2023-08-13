<?php

namespace App\Http\Controllers;

use App\Escuela;
use Validator;
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
        $rules = [
            'escuela'                   => 'required|integer',
            'mesa'                      => 'required|integer',
            'votoscambiacaleta'         => 'required|integer',
            'votoscoaliciontuespacio'   => 'required|integer',
            'votosjuntosparacambiarcaleta' => 'required|integer',
            'votosjuntospodemos'        => 'required|integer',
            'votosporcaleta'            => 'required|integer',
            'votos19dediciembre'        => 'required|integer',
            'votoscaletacrece'          => 'required|integer',
            'votoscaletanosune'         => 'required|integer',
            'votoscaletasi'             => 'required|integer',
            'votoscaminoalavictoria'    => 'required|integer',
            'votosdesarrollocaletense'  => 'required|integer',
            'votoselegimoscreer'        => 'required|integer',
            'votosfuezajoven'           => 'required|integer',
            'votoshastalavictoria'      => 'required|integer',
            'votoskolinacaleta'         => 'required|integer',
            'votoslealtadycompromiso'   => 'required|integer',
            'votosmascerca'             => 'required|integer',
            'votosmejorcaleta'          => 'required|integer',
            'votosnaceunaesperanza'     => 'required|integer',
            'votospensarcaletense'      => 'required|integer',
            'votospropuestajoven'       => 'required|integer',
            'votosproyectojoven'        => 'required|integer',
            'votosunidadycompromiso'    => 'required|integer',
            'votosfrentedeizquierda'    => 'required|integer',
            'votoscambiandostacruz'     => 'required|integer',
            'votosconsensopro'          => 'required|integer',
            'votosesahora'              => 'required|integer',
            'votoslafuerzadelcambio'    => 'required|integer',
            'votosmassantacruz'         => 'required|integer',
            'votosmilei'                => 'required|integer',
            'votosparacrecer'           => 'required|integer',
            'votospodemosrenovar'       => 'required|integer',
            'votosporcaletaoliv'        => 'required|integer',
            'votossantacruzpuede'       => 'required|integer',
            'votossoluciones'           => 'required|integer',
            'votossomosstacruz'         => 'required|integer',
            'votosnulos'                => 'required|integer',
            'votosrecurridos'           => 'required|integer',
            'votosimpugnados'           => 'required|integer',
            'votoscomelectoral'         => 'required|integer',
            'votosblanco'               => 'required|integer',
            'totalgral'                 => 'required|integer'            
        ];

        $messages = [
            'required'              => 'Debes ingresar todos los valores.',
            'integer'               => 'Los valores tienen que ser números.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
       /*
        elecciones::create([
            'tipo'          => strip_tags($request->input('tipo')),
            'nombre'        => strip_tags($request->input('nombre')),
            'cargo1'        => strip_tags($request->input('cargo1')),
            'candidato1'    => strip_tags($request->input('candidato1')),
            'cargo2'        => strip_tags($request->input('cargo2')),
            'candidato2'    => strip_tags($request->input('candidato2')),
            'color'         => strip_tags($request->input('color')),
            'votos'         => '0',
            'porcentaje'    => '0.00',
            'imagen'        => $imagennombre,
            'logo'          => $logonombre
        ]);
        */
        
        return redirect()->action('MesasController@index')->with('success', 'Mesa cargada con éxito.');
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
