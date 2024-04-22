<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PosesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videojuego_id = $request->input('videojuego_id', 'Sin ID');
        $action = $request->input('action', 'Sin Acción');
        $user_id = Auth::User()->id;

        return view('posesiones.index', ['videojuego_id' => $videojuego_id, 'action' => $action , 'user_id' => $user_id]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $videojuego_id = $request->input('videojuego_id', 'Sin ID');
        $action = $request->input('action', 'Sin Acción');
        $user_id = Auth::user()->id;

        if ($action === 'tengo') {
            DB::table('posesiones')->insert([
                'videojuego_id' => $videojuego_id,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } else {
            DB::table('posesiones')->where([
                'videojuego_id' => $videojuego_id,
                'user_id' => $user_id,
            ])->delete();
        }

        return redirect()->route('videojuegos.index')->with('success', 'Acción realizada con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
