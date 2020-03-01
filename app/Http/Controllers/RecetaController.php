<?php

namespace App\Http\Controllers;
use App\Receta;
use App\Medida;
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
        return view('index', compact('title', 'recetas'));
    }

    public function create()
    {
        $medidas= Medida::all();
        return view('recetas.create',compact('medidas'));
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
        $medidas= Medida::all();
        return view('recetas.index', compact('title', 'recetas','medidas'));
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'personas' => 'required',
            'tiempo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'personas.required' => 'El campo personas es obligatorio',
            'tiempo.required' => 'El campo tiempo es obligatorio'
        ]);
        Receta::create([
            'nombre' => $data['nombre'],
            'personas' => $data['personas'],
            'tiempo' => $data['tiempo'],
        ]);
        return redirect()->route('recetas.index');

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
