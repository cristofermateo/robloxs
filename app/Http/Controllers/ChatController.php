<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::all();
        return $chats;
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
        $chats = new Chat;
        $chats->game_id= $request->game_id;

        $chats->save();
        return $chats;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chats = Chat::find($id);
        return $chats;

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
        $chats = Chat::find($id);
        $request->validate([
            'game_id' => 'required',
        ]);
        $chats->game_id = $request->game_id;
        $chats->update();
        return $chats;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Chat::where('id', $id)->exists()) {
            // El usuario existe
            $chats = Chat::find($id);
            $chats->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'chat eliminado';
        } else {
        // El usuario no existe
            return 'ese chat ya se elimino';
        }
    }
}
