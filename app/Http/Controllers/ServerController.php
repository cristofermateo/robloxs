<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use PHPUnit\Event\TestSuite\Loaded;

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
        $servers->game_id = $request->game_id;



        $servers->save();
        return $servers;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servers = Server::find($id);
        $servers->load('users');
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
            'name' => 'required',
            'type' => 'required',
            'game_id' => 'required',
            'region' => 'required',
        ]);
        $servers->region = $request->region;
        $servers->type = $request->type;
        $servers->name = $request->name;
        $servers->game_id = $request->game_id;

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
            $server = Server::find($id);
            $server->delete();
            return 'servidor eliminado';
        } else {
        // El usuario no existe
            return '?';
        }
    }
}
