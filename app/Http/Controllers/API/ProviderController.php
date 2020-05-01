<?php

namespace App\Http\Controllers\API;
use App\Models\Provider;
use App\Http\Resources\ProviderResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProviderResource::collection(Provider::with('rates')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $provider = Provider::create([
              'provider_name' => $request->name,
            ]);
      
            return new ProviderResource($provider);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider=Provider::find($id);
        return new ProviderResource($provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // check if currently authenticated user is the owner of the book
      //if ($request->user()->id !== $book->user_id) {
        //return response()->json(['error' => 'You can only edit your own books.'], 403);
      //}
      $provider = Provider::findOrFail($id);
      $provider->update($request->all());

      return new ProviderResource($provider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return response()->json(null, 204);
    }
}
