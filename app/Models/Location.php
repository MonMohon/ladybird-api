<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = "locations";
    protected $fillable = ['location_name'];
    public function device()
    {
      return $this->hasOne(Device::class);
    }    
}
