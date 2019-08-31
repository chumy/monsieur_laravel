<?php

namespace App\Http\Controllers;
use App\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index()
    {
        //$users = DB::table('users')->get();
        $recetas = Receta::all();
        $title = 'Listado de recetas';
//        return view('users.index')
//            ->with('users', User::all())
//            ->with('title', 'Listado de usuarios');
        return view('recetas.index', compact('title', 'recetas'));
    }

    public function create()
    {
        return view('recetas.create');
    }

    public function show()
    {
        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }

    public function edit()
    {
        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }

    public function store()
    {
        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }

    public function update()
    {
        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }


    public function destroy()
    {
        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }
}
