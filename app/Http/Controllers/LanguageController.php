<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        Session::set('applocale', $lang);
        return Redirect('home');
    }
}
