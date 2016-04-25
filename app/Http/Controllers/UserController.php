<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function create(Request $request)
    {
        User::create([
            'franchise_id' => $request['franchise'],
            'role' => $request['role'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/franchise/view/'.$request['franchise']);
    }
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        Auth::user()->update($request->all());
    }
}
