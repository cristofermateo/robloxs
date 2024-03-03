<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Comments = Comment::all();
        return $Comments;
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
        $Comments = new Comment;
        $Comments->user_id= $request->user_id;
        $Comments->text= $request->text;
        $Comments->chat_id= $request->chat_id;

        $Comments->save();
        return $Comments;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Comments = Comment::find($id);
        return $Comments;

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
        $Comments = Comment::find($id);
        $request->validate([
            'user_id' => 'required',
            'text' => 'required',
            'chat_id' => 'required',
        ]);
        $Comments->user_id= $request->user_id;
        $Comments->text= $request->text;
        $Comments->chat_id= $request->chat_id;


        $Comments->update();
        return $Comments;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Comment::where('id', $id)->exists()) {
            // El usuario existe
            $Comments = Comment::find($id);
            $Comments->delete();
            // Procede con cualquier acción adicional después de eliminar el usuario
            return 'comentario eliminado';
        } else {
        // El usuario no existe
            return 'nada por eliminar';
        }
    }
}
