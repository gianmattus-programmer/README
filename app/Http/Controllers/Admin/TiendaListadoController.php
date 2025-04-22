<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Image;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class TiendaListadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $rolus = RoleUser::all();

        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::all();

        return view('admin.tienda.listados.index', compact('users', 'roles', 'rolus', 'listados', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tienda.listados.create');
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
            $image_name = "panel/tienda/informacion" . time(). $key.'.png';
            $linkimage = "https://pralemyfashionschool.com/".$image_name;
            file_put_contents($image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$linkimage);
        }
        $informacion = $dom->saveHTML();

        $request->validate([
            'file'          => 'image|mimes:jpeg,png,jpg',
        ]);

        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/tienda/listados';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }else{
            $parkingfile = "pralemy_default.jpg";
        }
        
        TiendaListado::create([
            'nombre'                    => $request->nombre,
            'descripcion'               => $request->descripcion,
            'tiendacategoria_id'        => $request->tiendacategoria_id,
            'file'                      => $parkingfile,
            'informacion'               => $informacion,
            'precio'                    => $request->precio,
            'descuento'                 => $request->descuento,
            'estado'                    => $request->estado,
            'estatus'                   => $request->estatus,
        ]);

        return redirect()->route('tiendalistados.index')->with('success','Nueva producto agregado.');
    }

    /**
     * Display the specified resource.
     */
    
    public function show($id)
    {
        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::all();

        $listado = TiendaListado::find($id);

        return view('admin.tienda.listados.show', compact('listado', 'listados', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::all();

        $listado = TiendaListado::find($id);
        return view('admin.tienda.listados.edit', compact('listado', 'listados', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();
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

        $in['nombre']                   = $request->nombre;
        $in['descripcion']              = $request->descripcion;
        $in['tiendacategoria_id']       = $request->tiendacategoria_id;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/tienda/listados';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['informacion']  = $informacion;
        $in['precio']       = $request->precio;
        $in['descuento']    = $request->descuento;
        $in['estado']       = $request->estado;
        $in['estatus']      = $request->estatus;
        
        $list = TiendaListado::find($id);
        $list->update($in);

        return redirect()->route('tiendalistados.index')->with('success','Producto actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TiendaListado::destroy($id);
        return redirect()->route('tiendalistados.index')->with('success','Producto eliminado.');
    }
}
