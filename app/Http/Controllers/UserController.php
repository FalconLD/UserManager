<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. (Muestra la lista de usuarios)
     */
    public function index()
    {

        $users = User::orderBy('name', 'asc')->paginate(10); 

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('users.index')->with('status', 'Usuario creado exitosamente.');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // 1. VALIDACIÓN
        $rules = [
            'name' => 'required|string|max:255',
            // ... (resto de reglas)
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ];

        // CORRECCIÓN: Capturar los datos validados de la llamada a validate()
        $data = $request->validate($rules); // <--- CAMBIO CLAVE AQUÍ

        
        // 3. MANEJO DE LA CONTRASEÑA OPCIONAL
        if (!empty($data['password'])) {
            // Si hay contraseña, la encriptamos antes de guardar
            $user->password = Hash::make($data['password']);
            // El resto de los datos (name, email) ya están en $data
        } else {
            // Si la contraseña está vacía, la quitamos de $data para no sobrescribir la actual
            unset($data['password']);
        }

        // 4. ACTUALIZACIÓN: Guardar los cambios
        // Rellenamos el modelo con los datos restantes (name, email)
        $user->fill($data);
        $user->save();

        // 5. REDIRECCIÓN
        return redirect()->route('users.index')->with('status', 'Usuario ' . $user->name . ' actualizado exitosamente.');
    }
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $user)
    {
        // 1. CONTROL DE SEGURIDAD (Opcional pero muy recomendado)
        // Impedimos que un administrador se elimine a sí mismo
        if (Auth::user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'No puedes eliminar tu propia cuenta de administrador.');
        }

        // 2. ELIMINACIÓN: Llama al método delete() del Modelo Eloquent
        // Esto elimina el registro de la tabla 'users' en PostgreSQL.
        $user->delete();

        // 3. REDIRECCIÓN
        return redirect()->route('users.index')->with('status', 'Usuario ' . $user->name . ' eliminado exitosamente.');
    }
}
