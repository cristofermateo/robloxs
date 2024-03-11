<?php

namespace App\Http\Controllers;

use App\Models\SubCat;
use Illuminate\Http\Request;

class SubCatController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcats = SubCat::all();
        return $subcats;
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
        $SubCats = new SubCat;
        $SubCats->name = $request->name;
        $SubCats->cat_id = $request->cat_id;


        $SubCats->save();
        return $SubCats;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $SubCats = SubCat::find($id);
        return $SubCats;

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
        $SubCats = SubCat::find($id);
        $request->validate([

            'name' => 'required',

        ]);
        $SubCats->type = $request->type;

        $SubCats->update();
        return $SubCats;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (SubCat::where('id', $id)->exists()) {
            // El usuario existe
            $SubCats = SubCat::find($id);
            $SubCats->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'eliminado';
        } else {
        // El usuario no existe
            return 'se intento eliminar nada';
        }
    }
}
