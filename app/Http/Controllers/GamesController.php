<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    <?php

namespace App\Http\Controllers;

use App\Models\Robuk;
use Illuminate\Http\Request;

class RobukController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $robuks = Robuk::all();
        return $robuks;
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
        $robuks = new Robuk;
        $robuks->user_id= $request->user_id;
        $robuks->total = $request->total;


        $robuks->save();
        return $robuks;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $robuks = Robuk::find($id);
        return $robuks;

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
        $robuks = Robuk::find($id);
        $request->validate([

            'total' => 'required',
            'user_id' => 'required',
        ]);

        $robuks->total = $request->total;
        $robuks->user_id = $request->user_id;

        $robuks->update();

        return $robuks;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Robuk::where('id', $id)->exists()) {
            // El usuario existe
            $robuk = Robuk::find($id);
            $robuk->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'has gastado tus robuks';
        } else {
        // El usuario no existe
            return 'ya has gastado tus robuks';
        }
    }
}

}
