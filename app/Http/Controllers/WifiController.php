<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

class WifiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('wifi');
    }

    public function wifi(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|',
          'password' => 'required|',
        ]);
        $name = $request -> get('name');
        $password = $request -> get('password');

        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  3  '$name' '$password' ", $output);
        $output=last($output);
        return redirect('home');
    }


}
