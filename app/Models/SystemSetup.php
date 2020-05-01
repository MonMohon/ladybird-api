<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetup extends Model
{
    public $table = "user_setups";
    protected $fillable = ['id','user_id','provider_id','meter_id','provider_contact_date','wifi_name','wifi_password'];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function provider()
    {
      return $this->belongsTo(Provider::class);
    }
    public function meter()
    {
      return $this->belongsTo(MeterType::class);
    }
}
