<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    public $table = "readings";
    protected $fillable = ['user_id','device_id','current'];
}
