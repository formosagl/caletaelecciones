<?php

namespace App\Http\Controllers;

use App\Escuela;
use App\Mesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return redirect('dashboard');
    }

    public function dashboard() {
        $dashb = [
            'escuelas' => "0", 
            'mesas' => "163",
            'cargadas' => "0",
            'restan' => "0",
            'votosblancos' => "0",
            'votosimpugnados' => "0",
            'votoscomele' => "0",
            'votosnulos' => "0",
            'votosrecurridos' => "0",
            'votostotal' => "0"
        ];
        $dashb['escuelas'] = Escuela::count();
        $dashb['cargadas'] = Mesa::count();
        $dashb['restan'] = $dashb['mesas'] - $dashb['cargadas'];
        $dashb['votosblancos'] = Mesa::sum('votosblanco');
        $dashb['votosimpugnados'] = Mesa::sum('votosimpugnados');
        $dashb['votoscomele'] = Mesa::sum('votoscomelectoral');
        $dashb['votosnulos'] = Mesa::sum('votosnulos');
        $dashb['votosrecurridos'] = Mesa::sum('votosrecurridos');
        $dashb['votostotal'] = Mesa::sum('totalgral');

        return view("dashboard", compact("dashb"));
    }
}
