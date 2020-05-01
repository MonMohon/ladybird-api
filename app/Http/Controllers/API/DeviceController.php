<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use App\Models\Device;
use App\Http\Resources\DeviceResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    protected $user;
    public function index()
    {
        return DeviceResource::collection(Device::where('user_id', Auth::user()->id)->get());
    }
    public function store(Request $request)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $setup = Device::create([
            'user_id' => $this->user->id,
            'location_id' => $request->location_id,
            'device_name' => $request->device_name,
            'device_image' => $request->device_image,
            'device_watt' => $request->device_watt,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Settings save.'
        ]);
    }    
}
