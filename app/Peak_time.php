<?php

namespace dae_client;

use Illuminate\Database\Eloquent\Model;
use DB;

class Peak_time extends Model
{
    protected $fillable = [
      'start','end','state','day',
    ];
}
