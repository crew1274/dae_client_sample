<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

class DashboardController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
      return view('home');
  }
}
