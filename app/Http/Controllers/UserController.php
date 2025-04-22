<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.home');*/

        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('welcome', compact('users', 'listados', 'categorias', 'tlistados', 'tcategorias'));
    }
}
