<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        if(Auth::user()->role=='admin'){
            return view('dashboard',[
                'users'=>$users
            ]);
        }
    } 

    public function ajout()
    {
        if(Auth::user()->role=='admin'){
            return view('ajoutUser');
        }
    } 
      /*  ajout de l utilisateur */
      public function editUser(Request $request){
          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make("passer10"),
            
        ]);
        Alert::success('Message de Success', 'enregistrement de l utilisateur reussi');
        $users = User::all();
        return view('dashboard',[
            'users'=>$users
        ]); 
    }

    /* fonction de suppression d un utilisateur */
    public function delete(Request $request){
        $user = User::find($request->id);
        $user->update([
            'isDelete'=>'true',
        ]);
        Alert::error('Message de Success', 'suppression de l utilisateur reussi');
        $users = User::all();
        return view('dashboard',[
            'users'=>$users
        ]);
    }

    /* edition d'un user */
    public function update($id, Request $request){
        $user = User::where('id', $id)->first();
        return view ('',[
            'user'=>$user
        ]);
    }

}


