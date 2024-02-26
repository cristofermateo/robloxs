<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->email = $request->email;

        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id); // Encuentra el usuario por su ID o devuelve una excepción si no se encuentra
        $user->load('weapons');
        $user->load('robuks');
        return $user; // Devuelve el usuario con sus armas cargadas


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
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'gender' => 'required'
        ]);

        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->gender = $request->gender;

        $user->update();

        return $user;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (User::where('id', $id)->exists()) {
            // El usuario existe
            $user = User::find($id);
            $user->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'se elimino correctamente el usuario';
        } else {
        // El usuario no existe
            return 'el usuario no existe';
        }
    }
}
