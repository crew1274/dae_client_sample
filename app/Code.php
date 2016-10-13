<?php

namespace dae_client;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
      'model','code',
    ];
}
