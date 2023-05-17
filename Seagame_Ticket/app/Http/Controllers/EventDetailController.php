<?php

namespace App\Http\Controllers;

use App\Models\EventDetail;
use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detail = EventDetail::all();
        return response()->json(['message' => 'Your request is successful', 'data' => $detail], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $detail = EventDetail::create([
            'time' => $request['time'],
            'matching'=> $request['matching'],
            'description'=> $request['description']
        ]);
        return response()->json(['message' => 'You data create successfully', 'data' => $detail], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $detail =  EventDetail::find($id);
        if($detail){
            $detail->update([
                'time' => $request['time'],
                'matching'=> $request['matching'],
                'description'=> $request['description']
            ]);
            return response()->json(['message' => 'You data update successfully', 'data' => $detail], 200);
        }
        return response()->json(['message' => "Don't have this ". $id], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $detail = DB::table('event_details')->where('event_id', $id)->delete();
        if($detail){
            return response()->json(['message' => 'You data deleted successfully'], 200);
        }
        return response()->json(['message' => "Don't have this ". $id], 200);
    }
}
