<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Politica;

use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class PoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $politicas = Politica::all();

        return view('admin.politicas.index', compact('politicas'));
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
        $informacion = $request->informacion;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8" ?>' . $informacion, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "panel/politicas/" . time(). $key.'.png';
            $linkimage = "https://pralemyfashionschool.com/".$image_name;
            file_put_contents($image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$linkimage);
        }
        $informacion = $dom->saveHTML();

        Politica::create([
            'informacion'               => $informacion,
            'estatus'                   => $request->estatus,
        ]);

        return back()->with('success','Información agregada.');
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
    public function update(Request $request, $id)
    {
        $mod = Politica::find($id);

        $informacion = $request->informacion;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8" ?>' . $informacion, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
              
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "panel/politicas/" . time(). $key.'.png';
                $linkimage = "https://pralemyfashionschool.com/".$image_name;
                file_put_contents($image_name,$data);
    
                $img->removeAttribute('src');
                $img->setAttribute('src',$linkimage);
            }
        }

        $informacion = $dom->saveHTML();

        $mod->update([
            'informacion'               => $informacion,
            'estatus'                   => $request->estatus,
        ]);

        return back()->with('success','Información actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Politica::destroy($id);
        return back()->with('success','Información eliminada.');
    }
}
