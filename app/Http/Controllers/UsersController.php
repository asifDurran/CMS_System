<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Users\PrfoileUpdateRequest;


use App\User;

class UsersController extends Controller
{
    
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success','User become an admin successfully');



        return redirect(route('users.index'));
    }

    public function edit()
    {
    
         return view('users.edit')->with('user',auth()->user());

    }

    public function update(PrfoileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update([

            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success','User profile updated successfully');

        return redirect()->back();



    }
}
