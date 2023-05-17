<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tickets = Ticket::with('event')->get();
        return response()->json(['message'=>'This is a list of tickets','data'=>$tickets],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= Ticket::create([
            'name' => $request['name'],
            'event_id' => $request['event_id'],

        ]);
        $ticket = Ticket::with('event')->where('id',$data->id)->get();
        return response()->json(['message'=>'You data create successfully','data'=>$ticket],200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $id)
    {
        //
        $data = Ticket::find($id);
        if($data){
            $data->update([
                'name' => $request['name'],
                'event_id' => $request['event_id'],
    
            ]);
            $ticket = Ticket::with('event')->where('id',$data->id)->get();
            return response()->json(['message'=>'You data updated','data'=>$ticket],200);
        }
        return response()->json(['message' =>"ID not found"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Ticket::find($id);
        if ($data){
            $data->destroy($id);
            $tickets = Ticket::with('event')->get();
            return response()->json(['message'=>'You data is deleted','data'=>$tickets],200);
        }
        return response()->json(['message' =>"ID not found"],200);
    }
}
