<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoTemario;
use App\Models\CursoModulo;

use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Image;

class CursoModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temarios = CursoTemario::all();

        return view('admin.cursos.modulos.index', compact('users', 'temarios'));
    }
    
    public function updateOrder(Request $request)
    {
        $ordermod = $request->input('ordermod'); // Se espera un array de IDs
        foreach ($ordermod as $index => $id) {
            CursoModulo::where('id', $id)->update(['ordermod' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $informacion = $request->informacion;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8" ?>' . $informacion, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "panel/cursos/modulos/" . time(). $key.'.png';
            $linkimage = "https://pralemyfashionschool.com/".$image_name;
            file_put_contents($image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$linkimage);
        }
        $informacion = $dom->saveHTML();

        CursoModulo::create([
            'nombre'                    => $request->nombre,
            'descripcion'               => $request->descripcion,
            'informacion'               => $informacion,
            'temario_id'                => $request->temario_id,
            'examen'                    => $request->examen,
            'estatus'                   => $request->estatus,
        ]);

        return back()->with('success','Nuevo Módulo agregado.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $temarios = CursoTemario::all();
        $modulo = CursoModulo::find($id);

        return view('admin.cursos.modulos.show', compact('modulo', 'temarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $temarios = CursoTemario::all();
        $modulo = CursoModulo::find($id);

        return view('admin.cursos.modulos.edit', compact('modulo', 'temarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mod = CursoModulo::find($id);

        $informacion = $request->informacion;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8" ?>' . $informacion, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
              
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "panel/cursos/modulos/" . time(). $key.'.png';
                $linkimage = "https://pralemyfashionschool.com/".$image_name;
                file_put_contents($image_name,$data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src',$linkimage);
            }
        }

        $informacion = $dom->saveHTML();

        $mod->update([
            'nombre'                    => $request->nombre,
            'descripcion'               => $request->descripcion,
            'informacion'               => $informacion,
            'temario_id'                => $request->temario_id,
            'examen'                    => $request->examen,
            'estatus'                   => $request->estatus,
        ]);

        return back()->with('success','Módulo actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CursoModulo::destroy($id);
        return back()->with('success','Módulo eliminado.');
    }
}
