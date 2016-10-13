<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class StaticipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('static');
    }

    public function static_ip(Request $request)
    {
        $wan = $request -> get('wan');
        $dns = $request -> get('dns');
        $gateway = $request -> get('gateway');
        $mask = $request -> get('mask');
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  2  '$wan' '$mask'  '$gateway' '$dns'", $output);
        $output=last($output);


        return redirect('home');
    }



}
