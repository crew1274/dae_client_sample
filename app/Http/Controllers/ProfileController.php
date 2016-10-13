<?php

namespace dae_client\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use dae_client\User;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id=Auth::id();
        $user = User::find($id);
        return view('auth.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
          'demand' => 'required|integer',
        ]);

        $id=Auth::id();
        $user = User::find($id);
        User::find($id)->update($request->all());
        return view('home');
    }
}
