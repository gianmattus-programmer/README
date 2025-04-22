<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\CursoCategoria;
use App\Models\CursoListado;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount('cursos')->get();
        $roles = Role::all();
        $rolus = RoleUser::all();

        return view('admin.profesores.index', compact('users', 'roles', 'rolus'));
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
        $ipAddress = new CaptureIpTrait();
        $role = Role::where('slug', '=', 'profesor')->first();
        $activated = true;

        $user = User::create([
            'name'             => strip_tags($request->input('first_name')),
            'first_name'       => strip_tags($request->input('first_name')),
            'last_name'        => strip_tags($request->input('last_name')),
            'email'            => $request->input('email'),
            'password'         => Hash::make($request->input('password')),
            'token'            => str_random(64),
            'admin_ip_address' => $ipAddress->getClientIp(),
            'activated'        => 3,
            'documento'        => strip_tags($request->input('documento')),
            'celular'          => strip_tags($request->input('celular')),
            'direccion'        => strip_tags($request->input('direccion')),
            'estatus'          => strip_tags($request->input('estatus')),
        ]);

        $user->attachRole($role);

        $profile = new Profile();
        $user->profile()->save($profile);
        $user->save();

        return back()->with('success', 'Registro de profesor creados');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profesor = User::with(['cursos.categoria'])->findOrFail($id);

        return view('admin.profesores.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->name = $request->first_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        
        if ($request->input('password') !== null) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->documento        = $request->input('documento');
        $user->celular          = $request->input('celular');
        $user->direccion        = $request->input('direccion');
        $user->estatus          = $request->input('estatus');
        $user->save();

        return back()->with('success', 'Registro de profesor actualizados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
