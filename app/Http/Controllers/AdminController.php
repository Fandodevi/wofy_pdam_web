<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index() 
    {
    $users = User::all(); // Retrieve all posts
    return response()->json(['data' => $users]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string',
        'password' => 'required|string',
        'noTelp' => 'required|string',
    ]);
    
    $user = User::create($validatedData);

    return response()->json(['message' => 'user created successfully', 'data' => $user], 201);
    }   

    public function update(Request $request, $idUser)
    {
    $user = user::find($idUser);

    if (!$user) {
        return response()->json(['message' => 'user not found'], 404);
    }

    $validatedData = $request->validate([
        'username' => 'string',
        'password' => 'string',
        'nama_adm' => 'string',
        'noTelp' => 'string',
    ]);

    $user->update($validatedData);

    return response()->json(['message' => 'user updated successfully', 'data' => $user]);
}

public function destroy($iduser)
{
    $user = User::find($iduser);

    if (!$user) {
        return response()->json(['message' => 'user not found'], 404);
    }

    $user->delete();


}
}
