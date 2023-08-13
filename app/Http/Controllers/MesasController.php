<?php

namespace App\Http\Controllers;

use App\Escuela;
use App\Mesa;
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
    public function index() {
        $escuelas = Escuela::orderBy('escuelas_nombre')->get();

        return view('mesas.index', compact('escuelas'));
    }

    public function create() {

    }

    public function cargar(Request $request) {
        $mesas = Mesa::where('pmesa_escuela', '=', $request->escuela)->where('pmesa_mesa', '=', $request->mesa)->first();

        if (!is_null($mesas)) {
            return back()->withErrors(['La mesa de esa escuela ya ha sido cargada.']);
        } else {
            if ($escuelas = Escuela::findOrFail($request->escuela)) {
                $mesas = $request->mesa;
            } else {
                return back()->withErrors(['Ocurrió un error seleccionando la escuela.']);
            }
    
            return view('mesas.create', compact('escuelas','mesas'));
        }
    }

    public function store(Request $request) {
        $rules = [
            'escuela'                   => 'required|integer|min:0',
            'mesa'                      => 'required|integer|min:0',
            'votoscambiacaleta'         => 'required|integer|min:0',
            'votoscoaliciontuespacio'   => 'required|integer|min:0',
            'votosjuntosparacambiarcaleta' => 'required|integer|min:0',
            'votosjuntospodemos'        => 'required|integer|min:0',
            'votosporcaleta'            => 'required|integer|min:0',
            'votos19dediciembre'        => 'required|integer|min:0',
            'votoscaletacrece'          => 'required|integer|min:0',
            'votoscaletanosune'         => 'required|integer|min:0',
            'votoscaletasi'             => 'required|integer|min:0',
            'votoscaminoalavictoria'    => 'required|integer|min:0',
            'votosdesarrollocaletense'  => 'required|integer|min:0',
            'votoselegimoscreer'        => 'required|integer|min:0',
            'votosfuezajoven'           => 'required|integer|min:0',
            'votoshastalavictoria'      => 'required|integer|min:0',
            'votoskolinacaleta'         => 'required|integer|min:0',
            'votoslealtadycompromiso'   => 'required|integer|min:0',
            'votosmascerca'             => 'required|integer|min:0',
            'votosmejorcaleta'          => 'required|integer|min:0',
            'votosnaceunaesperanza'     => 'required|integer|min:0',
            'votospensarcaletense'      => 'required|integer|min:0',
            'votospropuestajoven'       => 'required|integer|min:0',
            'votosproyectojoven'        => 'required|integer|min:0',
            'votosunidadycompromiso'    => 'required|integer|min:0',
            'votosfrentedeizquierda'    => 'required|integer|min:0',
            'votoscambiandostacruz'     => 'required|integer|min:0',
            'votosconsensopro'          => 'required|integer|min:0',
            'votosesahora'              => 'required|integer|min:0',
            'votoslafuerzadelcambio'    => 'required|integer|min:0',
            'votosmassantacruz'         => 'required|integer|min:0',
            'votosmilei'                => 'required|integer|min:0',
            'votosparacrecer'           => 'required|integer|min:0',
            'votospodemosrenovar'       => 'required|integer|min:0',
            'votosporcaletaoliv'        => 'required|integer|min:0',
            'votossantacruzpuede'       => 'required|integer|min:0',
            'votossoluciones'           => 'required|integer|min:0',
            'votossomosstacruz'         => 'required|integer|min:0',
            'votosnulos'                => 'required|integer|min:0',
            'votosrecurridos'           => 'required|integer|min:0',
            'votosimpugnados'           => 'required|integer|min:0',
            'votoscomelectoral'         => 'required|integer|min:0',
            'votosblanco'               => 'required|integer|min:0',
            'totalgral'                 => 'integer|min:0'
        ];

        $messages = [
            'required'      => 'Debes ingresar todos los valores.',
            'integer'       => 'Los valores tienen que ser números.',
            'min'           => 'Los valores no deben ser negativos.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
       
        Mesa::create([
            'pmesa_escuela'             => strip_tags($request->input('escuela')),
            'pmesa_mesa'                => strip_tags($request->input('mesa')),
            'votoscambiacaleta'         => strip_tags($request->input('votoscambiacaleta')),
            'votoscoaliciontuespacio'   => strip_tags($request->input('votoscoaliciontuespacio')),
            'votosjuntosparacambiarcaleta' => strip_tags($request->input('votosjuntosparacambiarcaleta')),
            'votosjuntospodemos'        => strip_tags($request->input('votosjuntospodemos')),
            'votosporcaleta'            => strip_tags($request->input('votosporcaleta')),
            'votos19dediciembre'        => strip_tags($request->input('votos19dediciembre')),
            'votoscaletacrece'          => strip_tags($request->input('votoscaletacrece')),
            'votoscaletanosune'         => strip_tags($request->input('votoscaletanosune')),
            'votoscaletasi'             => strip_tags($request->input('votoscaletasi')),
            'votoscaminoalavictoria'    => strip_tags($request->input('votoscaminoalavictoria')),
            'votosdesarrollocaletense'  => strip_tags($request->input('votosdesarrollocaletense')),
            'votoselegimoscreer'        => strip_tags($request->input('votoselegimoscreer')),
            'votosfuezajoven'           => strip_tags($request->input('votosfuezajoven')),
            'votoshastalavictoria'      => strip_tags($request->input('votoshastalavictoria')),
            'votoskolinacaleta'         => strip_tags($request->input('votoskolinacaleta')),
            'votoslealtadycompromiso'   => strip_tags($request->input('votoslealtadycompromiso')),
            'votosmascerca'             => strip_tags($request->input('votosmascerca')),
            'votosmejorcaleta'          => strip_tags($request->input('votosmejorcaleta')),
            'votosnaceunaesperanza'     => strip_tags($request->input('votosnaceunaesperanza')),
            'votospensarcaletense'      => strip_tags($request->input('votospensarcaletense')),
            'votospropuestajoven'       => strip_tags($request->input('votospropuestajoven')),
            'votosproyectojoven'        => strip_tags($request->input('votosproyectojoven')),
            'votosunidadycompromiso'    => strip_tags($request->input('votosunidadycompromiso')),
            'votosfrentedeizquierda'    => strip_tags($request->input('votosfrentedeizquierda')),
            'votoscambiandostacruz'     => strip_tags($request->input('votoscambiandostacruz')),
            'votosconsensopro'          => strip_tags($request->input('votosconsensopro')),
            'votosesahora'              => strip_tags($request->input('votosesahora')),
            'votoslafuerzadelcambio'    => strip_tags($request->input('votoslafuerzadelcambio')),
            'votosmassantacruz'         => strip_tags($request->input('votosmassantacruz')),
            'votosmilei'                => strip_tags($request->input('votosmilei')),
            'votosparacrecer'           => strip_tags($request->input('votosparacrecer')),
            'votospodemosrenovar'       => strip_tags($request->input('votospodemosrenovar')),
            'votosporcaletaoliv'        => strip_tags($request->input('votosporcaletaoliv')),
            'votossantacruzpuede'       => strip_tags($request->input('votossantacruzpuede')),
            'votossoluciones'           => strip_tags($request->input('votossoluciones')),
            'votossomosstacruz'         => strip_tags($request->input('votossomosstacruz')),
            'votosnulos'                => strip_tags($request->input('votosnulos')),
            'votosrecurridos'           => strip_tags($request->input('votosrecurridos')),
            'votosimpugnados'           => strip_tags($request->input('votosimpugnados')),
            'votoscomelectoral'         => strip_tags($request->input('votoscomelectoral')),
            'votosblanco'               => strip_tags($request->input('votosblanco')),
            'totalgral'                 => strip_tags($request->input('totalgral')),
            'cargadopor'                => strip_tags($request->input('cargadopor'))
        ]);        
        
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
