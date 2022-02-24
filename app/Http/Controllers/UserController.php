<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        return back()
        ->with('success', 'User berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        //     'role' => 'required'
        // ]);
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
            $user->save();

        return back()
        ->with('success', 'User berhasil diedit!');
    }

    public function delete($id)
    {
        User::findOrfail($id)->delete();
        return back()
        ->with('success', 'User berhasil diedit!');
    }
}
