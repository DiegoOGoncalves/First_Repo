<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return view('animal');
    }

    public function create(Request $request)
    {
        echo "Espécie do Animal: {$request->especie}<br />";
        echo "Raça do Animal: {$request->raca}<br />";
        echo "Nome Completo do Animal: {$request->fullname}<br />";
        echo "Idade do Animal: {$request->nascimento}<br />";
    }
}
