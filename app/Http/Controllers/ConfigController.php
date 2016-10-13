<?php

namespace dae_client\Http\Controllers;

use Illuminate\Http\Request;

use dae_client\Http\Requests;

use dae_client\Peak_time;


class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $peaks = Peak_time::orderBy('start', 'asc')->get();
        return view('config',compact('peaks'));
    }

    public function create()
   {
       return view('config_create');
   }

   public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date_format:H:m:s|time_conflict:day|include_check:end,day',
            'end' => 'required|date_format:H:m:s|time_conflict:day|greater_check:start,day',
            'state' => 'required|string',
            'day' => 'required|string',
            'day' => 'required|string',
        ]);
        Peak_time::create($request->all());
        return redirect()->route('config.index')
                        ->with('success','Created successfully');
    }

    public function show($id)
    {
        $config = Peak_time::find($id);
        return view('config_show',compact('config'));
    }

    public function edit($id)
    {
        $config = Peak_time::find($id);
        return view('config_edit',compact('config'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'start' => 'required|date_format:H:m:s|time_conflict_edit:{$id},day|include_check_edit:end,{$id},day',
            'end' => 'required|date_format:H:m:s|time_conflict_edit:{$id},day|greater_check:start',
            'state' => 'required|string',
            'day' => 'required|string',
            'day' => 'required|string',
        ]);
        Peak_time::find($id)->update($request->all());
        return redirect()->route('config.index')
                        ->with('success','Time Config updated successfully!');
    }

    public function destroy($id)
   {
       Peak_time::find($id)->delete();
       return redirect()->route('config.index')
                       ->with('success','Config deleted successfully');
   }


}
