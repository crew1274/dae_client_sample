<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use Datatables;
use dae_client\Code;

class TableController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $codes =  Code::of(Code::query())->make(true);
      return view('table',compact('codes'));
  }

  public function ajax()
  {
  return $this->datatables
      ->eloquent($this->query())
      ->make(true);
  }

  public function query()
  {
    $users = User::select();

    return $this->applyScopes($users);
  }

  
}
