<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTalent;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
        public function index()
        {
            // $user = User::all();

            $user = DB::table('users')
                    ->leftJoin('talent_user', 'users.id', '=', 'talent_user.user_id')
                    ->select('users.*', 'talent_user.*')
                    ->get()
                    ->groupBy('id')
                    ->map(function ($group) {
                        return $group->first();
                    });;

            
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

    public function edit($id)
    {
        $User = User::find($id);
        $talent = Talent::all();
        $talentUser =  UserTalent::where('user_id', $id)->get();
        return view('admin.user.edit', compact('User', 'talent', 'talentUser'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return back()
            ->with('success', 'User berhasil diedit!');
    }

        public function updateTalent(Request $request)
        {
            UserTalent::where('user_id', $request->user_id)->delete();
            foreach ($request->talent as $key => $value) {
                if ($value != null && $value != 0) {
                    UserTalent::create([
                        'user_id' => $request->user_id,
                        'talent_id' => $key,
                        'score' => $value
                    ]);
                }
            }
            return back();
        }

    public function addTalentUser(Request $request, $userId)
    {
        $request->validate([
            'talent_id' => 'required|numeric',
            'score' => 'required|numeric',
        ]);

        UserTalent::create([
            'user_id' => $userId,
            'talent_id' => $request->talent_id,
            'score' => $request->score,
        ]);

        return back()->with('success', 'Talent User berhasil ditambahkan');
    }

    public function delete($id)
    {
        User::findOrfail($id)->delete();
        return back()
            ->with('success', 'User berhasil diedit!');
    }
}
