<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public $table = "providers";
    protected $fillable = ['provider_name'];
    public function rates()
    {
      return $this->hasMany(Rate::class);
    }
}
