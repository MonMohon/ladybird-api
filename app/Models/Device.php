<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public $table = "devices";
    protected $fillable = ['user_id','location_id','device_name','device_image','device_watt'];
    
    public function user()
    {
      return $this->belongsTo('App\Models\User','user_id');
    }
    public function location()
    {
      return $this->belongsTo('App\MOdels\Location','location_id');
    }
}
