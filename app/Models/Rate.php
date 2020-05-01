<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $table = "provider_rates";
    protected $fillable = ['provider_id','rate'];
    
    public function provider()
    {
      return $this->belongsTo(Provider::class);
    }
}
