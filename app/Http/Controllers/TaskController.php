<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all(); // Pak alle todos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'integer',
            'name' => 'required|string',
            'completed' => 'boolean',
            'files' => 'image|nullable|max:1999'
        ]);

        $todo = Todo::create($data);

        return response($todo, 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'id' => 'integer',
            'name' => 'required|string',
            'completed' => 'boolean',
            'files' => 'image|nullable|max:1999'
        ]);

        $todo->update($data);

        return response($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response([
            "message" => "Je hebt een todo verwijderd.",
            201
        ]);

    }
}