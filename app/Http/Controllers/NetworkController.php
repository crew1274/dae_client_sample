<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class NetworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('network');
    }

}
