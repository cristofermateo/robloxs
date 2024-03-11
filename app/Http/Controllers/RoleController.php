<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Role = Role::all();
        return $Role;
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
        $Role = new Role;
        $Role->name= $request->name;


        $Role->save();
        return $Role;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Role = Role::find($id);
        return $Role;

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
    public function update(Request $request, String $id)
    {
        $Role = Role::find($id);
        $request->validate([

            'name' => 'required',

        ]);
        $Role->name = $request->name;

        $Role->update();
        return $Role;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Role::where('id', $id)->exists()) {
            // El usuario existe
            $Role = Role::find($id);
            $Role->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'chat eliminado';
        } else {
        // El usuario no existe
            return 'ese chat ya se elimino';
        }
    }
}
