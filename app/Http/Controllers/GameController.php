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
        $game = Game::all();
        return $game;
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
        $game = new Game;
        $game->user_id= $request->user_id;
        $game->name = $request->name;


        $game->save();
        return $game;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::find($id);
        return $game;

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
        // en lugar de recibir el modelo, mejor recibe el id, para que funcione postman
        //  public function update(Request $request, String $id)
        $game = Game::find($id);
        $request->validate([

            'name' => 'required',
            'user_id' => 'required',
        ]);

        $game->name = $request->name;
        $game->user_id = $request->user_id;

        $game->update();

        return $game;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Game::where('id', $id)->exists()) {
            // El usuario existe
            $game = Game::find($id);
            $game->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'juego eliminado';
        } else {
        // El usuario no existe
            return 'ese juego ya se ha eliminado';
        }
    }
}