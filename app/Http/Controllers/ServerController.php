<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers = Server::all();
        return $servers;
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
        $servers = new Server;
        $servers->type= $request->type;
        $servers->name = $request->name;
        $servers->region = $request->region;


        $servers->save();
        return $servers;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servers = Server::find($id);
        return $servers;

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
        $servers = Server::find($id);
        $request->validate([
            'name' => 'name',
            'type' => 'type',
            'region' => 'region',
        ]);
        $servers->region = $request->region;
        $servers->type = $request->type;
        $servers->name = $request->name;
        $servers->update();
        return $servers;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Server::where('id', $id)->exists()) {
            // El usuario existesminar el usuario
            return 'has gastado tus robuks';
        } else {
        // El usuario no existe
            return 'ya has gastado tus robuks';
        }
    }
}
