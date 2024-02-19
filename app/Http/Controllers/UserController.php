<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test(){
        /* Traerme todos los usuarios 
        $users = User::all();

        // Crear un usuario 
        $user = User::create([
            'name'=>'Horacio',
            'email'=>'horacio@horacio.com',
            'password'=>bcrypt('123123')
        ]);

        // Actualizar un usuario 

        // Paso 1 -> busco el usuario 
        $user = User::find(1);
        $user->name = 'nuevo nombre';
        $user->save();

        // Eliminar usuario
        $user = User::find(1);
        $user->delete();

        // Mostrar 
        $user = User::find(1);
        */
    }
}
