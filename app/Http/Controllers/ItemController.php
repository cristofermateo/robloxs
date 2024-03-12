<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return $items;
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
        $items = new Item; 
        $items->name = $request->name;
        $items->price= $request->price;
        $items->photo= $request->photo;
        $items->sub_cat_id = $request->sub_cat_id; 
        $items->save();
        return $items;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // $game = Game::find($id);
       $items = Item::find($id);
        return $items;
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
        $items = Item::find($id);
        $request->validate([ 
            'name' => 'required', 
            'photo' => 'rquired',
            'price' => 'required',
            'cat_id' => 'cat_id', 
        ]); 
        $items->name = $request->name; 
        $items->price = $request->price;
        $items->photo = $request->photo;
        $items->cat_id = $request->cat_id; 
        $items->update(); 
        return $items; 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Item::where('id', $id)->exists()) {
            // El usuario existe
            $items = Item::find($id);
            $items->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'juego eliminado';
        } else {
        // El usuario no existe
            return 'ese juego ya se ha eliminado';
        }
    }
}
