<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use dae_client\Setting;
use dae_client\Code;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class SettingController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(Request $request)
    {
      $settings = Setting::orderBy('circuit','ASC')->paginate(4);
        return view('setting',compact('settings'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $models= Code::pluck('model', 'model');
        return view('setting_new',compact('models'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'model' => 'required|string',
            'address' => 'required|integer|min:1|max:255',
            'ch' => 'required|integer|min:1|max:15',
            'speed' => 'required|integer',
            'circuit' => 'required|integer|min:1|max:72|unique:settings,circuit',
        ]);
        Setting::create($request->all());
        return redirect()->route('setting.index')
                        ->with('success','Setting created successfully, but please valid before you use.');
    }

    public function show($id)
    {
      //$setting_id = Setting::find($id);
      //$process = new Process('echo');
      //$process->run();

        $setting = Setting::find($id);
        $setting_id= $setting -> id ;
        $output = array();
        exec("python3 /var/www/html/dae_client/python/valid.py '{$setting_id}' ", $output);
        $output=last($output);
        return redirect()->route('setting.index')
                        ->with('success',$output);
    }



    public function edit($id)
    {
        $models= Code::pluck('model', 'model');
        $setting = Setting::find($id);
        return view('setting_edit',compact('setting','models'));
    }



    public function update(Request $request, $id)
   {
        #$request => 'token' = 0;
       $this->validate($request, [
         'model' => 'required',
         'address' => 'required|integer|min:1|max:255',
         'ch' => 'required|integer|min:1|max:15',
         'speed' => 'required',
         'circuit' => 'required|integer|min:1|max:72|unique:settings,circuit,'.$id,
       ]);
       $token = Setting::find($id);
       $token-> token = '0';
       $token -> save();
       Setting::find($id)->update($request->all());
       return redirect()->route('setting.index')
                       ->with('success','Setting updated successfully!');
   }

    public function destroy($id)
   {
       Setting::find($id)->delete();
       return redirect()->route('setting.index')
                       ->with('success','Setting deleted successfully!');
   }



}
