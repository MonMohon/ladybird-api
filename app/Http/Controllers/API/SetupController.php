<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use App\Models\SystemSetup;
use App\Http\Resources\SetupResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    protected $user;
    /*
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    */
    /**
     * @return mixed
     */
    public function index()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $setup = $this->user->setup;
        return new SetupResource($setup);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $date=date_create($request->contact_date);
        $contact_date=date_format($date,"Y-m-d");
        $setup = SystemSetup::create([
            'user_id' => $this->user->id,
            'provider_id' => $request->provider_id,
            'meter_id' => $request->meter_id,
            'provider_contact_date' => $contact_date,
            'wifi_name' => $request->wifi_name,
            'wifi_password' => $request->wifi_password,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Settings save.'
        ]);
    }
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $setup = SystemSetup::findOrFail($id);
        if($this->user->id!=$setup->user_id){
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you are not allowed to update.'
            ], 400);
        }else{
            $date=date_create($request->contact_date);
            $contact_date=date_format($date,"Y-m-d");
            $setup->update(
                [
                    'user_id' => $this->user->id,
                    'provider_id' => $request->provider_id,
                    'meter_id' => $request->meter_id,
                    'provider_contact_date' => $contact_date,
                    'wifi_name' => $request->wifi_name,
                    'wifi_password' => $request->wifi_password,
                ]
            );
            return new SetupResource($setup);    
        }
    }
}
