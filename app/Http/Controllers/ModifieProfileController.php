<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ModifieProfileController extends Controller
{
    public function index(){
        // $user = User::findOrFail(auth()->user()->id);
        return view('profile.updateProfile');
    }

    public function update(){
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastName' => 'required',
            'dateNaissance' => 'required',
            'numero' => 'required',
            'numeroPieceIdentiter' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'rue' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->update($data);
        return redirect('/home');
    }

    public function avatar(Request $request){
        $data = request()->validate([
            'avatar' => "required|image"
        ]);

        $path = $request->file('avatar')->store('users');
        $user = User::findOrFail(auth()->user()->id);
        $user->update(['avatar' => $path]);
        return redirect('/home');
    }

    public function password(){
        $data = request()->validate([
            'password' => "required|min:8",
            'password1' => "required|min:8"
        ]);
        if($data['password'] == $data['password1']){
            $password = Hash::make($data['password']);
            $user = User::findOrFail(auth()->user()->id);
            $user->update(['password' => $password]);
            return redirect('/home');
        } else {
            return back()->with('error', "les deux champ sont different");
        }
    }

    public function show(){
        return view('profile.showProfile');
    }
}
