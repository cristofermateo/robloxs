<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weapon = Game::all();
        return $weapon;
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
        $weapon = new Game;
        $weapon->user_id= $request->user_id;
        $weapon->name = $request->name;


        $weapon->save();
        return $weapon;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weapon = Game::find($id);
        return $weapon;

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
    public function update(Request $request, Game $weapon)
    {
        //return $request->all();
        $request->validate([

            'name' => 'required',
            'user_id' => 'required',
        ]);

        $weapon->name = $request->name;
        $weapon->user_id = $request->user_id;

        $weapon->update();

        return $weapon;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Game::where('id', $id)->exists()) {
            // El usuario existe
            $weapon = Game::find($id);
            $weapon->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'has gastado tus weapon';
        } else {
        // El usuario no existe
            return 'ya has gastado tus weapon';
        }
    }
}
