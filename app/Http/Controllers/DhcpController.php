<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DhcpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dhcp');
    }

    public function dhcp()
    {
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  1 ", $output);
        $output=last($output);
        return redirect('home');
    }



}
