<?php

namespace dae_client;

use Illuminate\Database\Eloquent\Model;
use DB;
class Setting extends Model
{
  protected $fillable = [
    'model','address','ch','speed','circuit','token',
  ];

//  public static function createSetting($code, $address, $ch, $speed )
//  {
//      $topic = DB::table('settings')->insertGetId([
//        'code' => $code,
//        'address' => $address,
//        'speed' => $speed,
//        'token' => 0,
//        "created_at" =>  \Carbon\Carbon::now(),
//        "updated_at" => \Carbon\Carbon::now(),
//      ]);
//    }


    public static function deleteSetting($id) {
        return DB::table('settings')->where('id', $id);
      }


}
