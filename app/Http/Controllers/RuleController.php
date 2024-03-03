<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::all();
        return $rules;
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
        $rules = new Rule;
        $rules->game_id = $request->game_id;
        $rules->content = $request->content;


        $rules->save();
        return $rules;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rules = Rule::find($id);
        return $rules;

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
        $rules = Rule::find($id);
        $request->validate([
            'content' => 'content',
            'game_id' => 'game_id',

        ]);
        $rules->content = $request->content;
        $rules->game_id = $request->game_id;
        $rules->update();
        return $rules;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Rule::where('id', $id)->exists()) {
            // El usuario existe
            $rules = Rule::find($id);
            $rules->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'se elimino correctamente el usuario';
        } else {
        // El usuario no existe
            return 'el usuario no existe';
        }
    }
}
