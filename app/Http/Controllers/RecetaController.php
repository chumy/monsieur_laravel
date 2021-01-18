<?php

namespace App\Http\Controllers;

use App\Receta;
use App\Paso;
use App\Comando;
use Illuminate\Http\Request;
use App\Ingrediente;
use Illuminate\Support\Facades\DB;

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
        return view('recetas.create');
    }

    public function show($receta_id)
    {
        $receta = Receta::find($receta_id);
        return view('recetas.view', compact('receta'));
    }

    public function edit($receta_id)
    {
        $data = request();

        $receta = Receta::find($receta_id);
        $title = 'Listado de recetas';
        $comandos = Comando::all();

        $ingredientes = $receta->ingredientes()->get();
        $listaIngredientes = Ingrediente::all();
        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }

    public function store()
    {

        $title = 'Nueva receta';
        $data = request()->validate([
            'nombre' => 'required',
            'personas' => 'required',
            'tiempo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'personas.required' => 'El campo personas es obligatorio',
            'tiempo.required' => 'El campo tiempo es obligatorio'
        ]);

        $receta = Receta::create([
            'nombre' => $data['nombre'],
            'personas' => $data['personas'],
            'tiempo' => $data['tiempo'],
            'acitve' => 0,
        ]);

        $comandos = Comando::all();
        $listaIngredientes = Ingrediente::all();


        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }


    public function update($receta_id)
    {

        $title = 'Listado de recetas';
        $data = request()->validate([
            'nombre' => 'required',
            'personas' => 'required',
            'tiempo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'personas.required' => 'El campo personas es obligatorio',
            'tiempo.required' => 'El campo tiempo es obligatorio'
        ]);
        //return request();
        $receta = Receta::find($receta_id);
        $receta->update([
            'nombre' => $data['nombre'],
            'personas' => $data['personas'],
            'tiempo' => $data['tiempo'],
            'acitve' => 1,
        ]);

        $recetas = Receta::all();
        $title = 'Listado de recetas';

        //        return view('users.index')
        //            ->with('users', User::all())
        //            ->with('title', 'Listado de usuarios');
        return view('index', compact('title', 'recetas'));

        /*

        $comandos = Comando::all();

       

        //$ingredientes = $receta->ingredientes()->get();
        $listaIngredientes = Ingrediente::all();
        return view('recetas.edit', compact('title', 'receta','comandos','listaIngredientes'));*/
    }

    public function addIngrediente($receta_id)
    {
        $receta = Receta::find($receta_id);
        $title = 'Listado de recetas';
        $comandos = Comando::all();


        if (request()->ingrediente_id > 0) {
            $ing = Ingrediente::find(request()->ingrediente_id);
            //return $receta->ingredientes()->get();
            $receta->ingredientes()->attach($ing, ["cantidad" => request()->cantidad]);
        } elseif (request()->ingrediente_id == "") {

            $ing = new Ingrediente;
            $ing->nombre = request()->ingrediente;
            $ing->save();
            $receta->ingredientes()->attach($ing, ["cantidad" => request()->cantidad]);
        }

        $listaIngredientes = Ingrediente::all();

        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }

    public function delIngrediente($receta_id)
    {
        $receta = Receta::find($receta_id);
        $title = 'Listado de recetas';
        $comandos = Comando::all();
        $receta->ingredientes()->detach(request()->delete_ing);

        $listaIngredientes = Ingrediente::all();

        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }

    public function addPaso($receta_id)
    {
        $receta = Receta::find($receta_id);
        $title = 'Listado de recetas';
        $comandos = Comando::all();



        if (request()->paso_id > 0) {
            $paso = Paso::find(request()->paso_id);
            $paso->update([
                'descripcion' => request()->paso,
                'receta_id' => $receta_id,
                'tiempo' => request()->minutos * 60 + request()->segundos,
                'velocidad' => request()->velocidad,
                'temperatura' => request()->grados,
                'comando_id' => request()->comando,
                'atras' => isset(request()->atras) ? request()->atras : 0,
                'mariposa' => isset(request()->mariposa) ? request()->mariposa : 0,
                'cestillo' => isset(request()->cestillo) ? request()->cestillo : 0,
                'cubilete' => isset(request()->cubilete) ? request()->cubilete : 0,
            ]);
        } else {
            $orden = DB::table('pasos')
                ->where('receta_id', $receta_id)
                ->count();
            $orden = $orden + 1;

            $paso = Paso::create([
                'descripcion' => request()->paso,
                'orden' => $orden,
                'receta_id' => $receta_id,
                'tiempo' => request()->minutos * 60 + request()->segundos,
                'velocidad' => request()->velocidad,
                'temperatura' => request()->grados,
                'comando_id' => request()->comando,
                'atras' => isset(request()->atras) ? request()->atras : 0,
                'mariposa' => isset(request()->mariposa) ? request()->mariposa : 0,
                'cestillo' => isset(request()->cestillo) ? request()->cestillo : 0,
                'cubilete' => isset(request()->cubilete) ? request()->cubilete : 0,
            ]);
        }

        $listaIngredientes = Ingrediente::all();
        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }

    public function delPaso($receta_id)
    {

        $title = 'Listado de recetas';
        $receta = Receta::find($receta_id);
        $comandos = Comando::all();
        $paso = Paso::find(request()->delete_paso)->delete();
        $this->reorganizarPasos($receta_id);

        $listaIngredientes = Ingrediente::all();
        return view('recetas.edit', compact('title', 'receta', 'comandos', 'listaIngredientes'));
    }

    public function destroy($receta_id)
    {
        $receta = Receta::find($receta_id);

        $receta->ingredientes()->detach();
        $receta->pasos()->delete();
        $receta->delete();


        $recetas = Receta::all();
        $title = 'Listado de recetas';
        return view('recetas.index', compact('title', 'recetas'));
    }

    public function reorganizarPasos($receta_id)
    {

        $pasos = DB::table('pasos')->where('receta_id', $receta_id)->orderby('orden')->get();
        $i = 1;

        foreach ($pasos as $paso) {

            Paso::find($paso->id)->update(['orden' => $i]);
            $i++;
        }
    }

    public function autocomplete(Request $request)
    {


        $ingredientes = Receta::where('nombre', 'LIKE', $request->search . '%')->get();

        foreach ($ingredientes as $result) {
            $results[] = ['nombre' => $result->nombre];
        }

        return response()->json($results);
    }
}