<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function index()
    {
        return view('api.index');
    }

    public function all() {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function show($id) {
        $user = User::find($id);

        return response()->json($user,200);
    }

    public function store(Request $request) {
        
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        // Luego, puedes crear o actualizar registros en la base de datos
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        // Finalmente, genera una respuesta que se enviará de vuelta a Postman
        return response()->json([
            'mensaje' => 'Los datos han sido procesados correctamente'

        ]);
    }
}
