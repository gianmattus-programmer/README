<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoTemario;
use App\Models\CursoModulo;
use App\Models\CursoPrecio;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class EstatusController extends Controller
{
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
        //
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
        if($request->pagina == "cursoscategorias"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Categoría restaurada";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Categoría eliminada";
            }

            $cat = CursoCategoria::find($id);
            $cat->estatus = $request->estatus;
            $cat->save();

            return redirect()->route('cursoscategorias.index')->with($mensaje, $estados);
        }

        if($request->pagina == "cursoslistados"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Curso restaurado";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Curso eliminado";
            }

            $cli = CursoListado::find($id);
            $cli->estatus = $request->estatus;
            $cli->save();

            return redirect()->route('cursoslistados.index')->with($mensaje, $estados);
        }

        if($request->pagina == "cursostemarios"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Temario restaurado";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Temario eliminado";
            }

            $cte = CursoTemario::find($id);
            $cte->estatus = $request->estatus;
            $cte->save();

            return back()->with($mensaje, $estados);
        }

        if($request->pagina == "cursosmodulos"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Módulo restaurado";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Módulo eliminado";
            }

            $cte = CursoModulo::find($id);
            $cte->estatus = $request->estatus;
            $cte->save();

            return back()->with($mensaje, $estados);
        }

        if($request->pagina == "cursosprecios"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Precio restaurado";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Precio eliminado";
            }

            $cte = CursoPrecio::find($id);
            $cte->estatus = $request->estatus;
            $cte->save();

            return back()->with($mensaje, $estados);
        }

        /*Tienda update*/
        if($request->pagina == "tiendacategorias"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Categoría restaurada";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Categoría eliminada";
            }

            $cat = TiendaCategoria::find($id);
            $cat->estatus = $request->estatus;
            $cat->save();

            return redirect()->route('tiendacategorias.index')->with($mensaje, $estados);
        }

        if($request->pagina == "tiendalistados"){
            if($request->estatus == 1){
                $mensaje = "success";
                $estados = "Producto restaurado";
            }elseif($request->estatus == 2){
                $mensaje = "danger";
                $estados = "Producto eliminado";
            }

            $cli = TiendaListado::find($id);
            $cli->estatus = $request->estatus;
            $cli->save();

            return redirect()->route('tiendalistados.index')->with($mensaje, $estados);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
