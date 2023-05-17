<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        // $data = Stadium::with('zone')->get();
        $data = Stadium::join('zones', 'stadia.zone_id', '=', 'zones.id')
            ->select('stadia.*', 'zones.name as zone_name')
            ->get();
        return response()->json(['message' => 'This is a list of stadium', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        //
        $data = Stadium::create([
            'name' => $request['name'],
            'zone_id' => $request['zone_id'],

        ]);
        return response()->json(['message' => 'You data create successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Stadium::find($id);
        if ($data) {
            $data->update([
                'name' => $request['name'],
                'zone_id' => $request['zone_id'],

            ]);
            return response()->json(['message' => 'You data update successfully'], 200);
        }
        return  response()->json(['message' => "ID not fount"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Stadium::find($id);
        if ($data) {
            $data->destroy($id);
            return response()->json(['message' => 'You data deleted successfully'], 200);
        }
        return response()->json(['message' => 'ID not found'], 200);

    }
}
