<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. (Muestra la lista de usuarios)
     */
    public function index()
    {
        // 1. Obtener todos los usuarios de la base de datos
        // Usamos paginate(10) para no cargar miles de usuarios a la vez
        $users = User::orderBy('name', 'asc')->paginate(10); 

        // 2. Devolver la vista y pasarle la variable $users
        // La vista será 'users.index' (que crearemos en el siguiente paso)
        return view('users.index', compact('users'));
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
