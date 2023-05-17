<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $zone = Zone::all();
        return response()->json(['message' => 'Your request is successful', 'data' => $zone], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $zone = Zone::create([
            'name' => $request['name'],
        ]);
        return response()->json(['message' => 'You data create successfully', 'data' => $zone], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $zone =  Zone::find($id);
        if($zone){
            $zone->update([
                'name' => $request['name'],
            ]);
            return response()->json(['message' => 'You data update successfully', 'data' => $zone], 200);
        }
        return response()->json(['message' => "Don't have this ". $id], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $zone = Zone::find($id);
        if($zone){

            $zone->destroy($id);
            return response()->json(['message' => 'You data deleted successfully'], 200);
        }
        return response()->json(['message' => "Don't have this ". $id], 200);
    }
}
