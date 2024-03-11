<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::with('subcats')->get();

        return $cats;
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
        $cats = new Cat;
        $cats->name= $request->name;

        $cats->save();
        return $cats;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cats = Cat::where('id',$id)->with('SubCats.items')->first();

        return $cats;

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
        $cats = Cat::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $cats->name = $request->name;
        $cats->update();
        return $cats;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Cat::where('id', $id)->exists()) {
            // El usuario existe
            $cats = Cat::find($id);
            $cats->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'chat eliminado';
        } else {
        // El usuario no existe
            return 'ese chat ya se elimino';
        }
    }
}
