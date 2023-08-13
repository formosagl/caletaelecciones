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
            'restan' => "0"
        ];
        $dashb['escuelas'] = Escuela::count();
        $dashb['cargadas'] = Mesa::count();
        $dashb['restan'] = $dashb['mesas'] - $dashb['cargadas'];

        return view("dashboard", compact("dashb"));
    }
}
