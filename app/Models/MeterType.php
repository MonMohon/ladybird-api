<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterType extends Model
{
    public $table = "meter_types";
    protected $fillable = ['meter_name'];
}
