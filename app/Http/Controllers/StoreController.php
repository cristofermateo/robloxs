<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return $stores;
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
        $stores = new Store;
        $stores->type = $request->type;



        $stores->save();
        return $stores;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stores = Store::find($id);
        return $stores;

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
        $stores = Store::find($id);
        $request->validate([

            'type' => 'required',

        ]);
        $stores->type = $request->type;

        $stores->update();
        return $stores;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Store::where('id', $id)->exists()) {
            // El usuario existe
            $stores = Store::find($id);
            $stores->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'eliminado';
        } else {
        // El usuario no existe
            return 'se intento eliminar nada';
        }
    }
}
