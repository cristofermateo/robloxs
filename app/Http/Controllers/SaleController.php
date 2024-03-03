<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return $sales;
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
        $sales = new Sale;
        $sales->user_id = $request->user_id;
        $sales->total = $request->total;


        $sales->save();
        return $sales;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sale::find($id);
        return $sales;

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
        $sales = Sale::find($id);
        $request->validate([
            'name' => 'name',
            'type' => 'type',
            'region' => 'region',
        ]);
        $sales->total = $request->total;
        $sales->user_id = $request->user_id;
        $sales->update();
        return $sales;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Sale::where('id', $id)->exists()) {
            // El usuario existe
            $user = Sale::find($id);
            $user->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'se elimino correctamente el usuario';
        } else {
        // El usuario no existe
            return 'el usuario no existe';
        }
    }
}
