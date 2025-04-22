<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoTemario;
use App\Models\CursoModulo;
use App\Models\Examen;
use App\Models\User;
use Image;
use File;

class ExamenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = array();
        if($files = $request->file('file')){
            foreach($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'panel/examenes/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }

            $producto['file'] = implode('|', $images);
        }

        $filename = $producto['file'];

        $in = [];
        $in['temario_id']       = $request->temario_id;
        $in['file']             = $filename;
        $in['estatus']          = $request->estatus;
        
        $store = Examen::create($in);
        $user = \Auth::user();

        // Encuentra el temario actual y cambia su valor de columna 'examen'
        $currentTemario = CursoTemario::find($request->temario_id);
        $currentTemario->examen = 2; // Cambia el valor en el temario actual
        $currentTemario->save();

        // Encuentra el siguiente temario
        $nextTemario = CursoTemario::where('listado_id', $currentTemario->listado_id)
                    ->where('id', '>', $currentTemario->id) // Siguiente temario
                    ->where('estatus', 1) // Opcional: solo si debe estar activo
                    ->orderBy('id', 'asc') // Para obtener el siguiente en orden
                    ->first();

        if ($nextTemario) {
            $nextTemario->examen = 2; // Cambia el valor de la columna
            $nextTemario->save();
        }

        $cte = CursoTemario::find($request->temario_id);
        $cte->examen = 2;
        $cte->save();

        return redirect('profile/'.$user->name)->with('success','¡Felicidades, lograste pasar al sigiente temario de tu curso.!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
