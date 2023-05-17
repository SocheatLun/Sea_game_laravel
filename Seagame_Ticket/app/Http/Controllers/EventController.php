<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::with('eventDetails','stadium')->get();
        return response()->json(['message' =>'Your request is successful','data'=> $events],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = Event::create([
            'title' => $request['title'],
            'date' => $request['date'],
            'type' => $request['type'],
            'stadium_id' => $request['stadium_id'],
            'event_id' => $request['event_id'],
        ]);
        $event = Event::with('eventDetails','stadium')->where('id', $data->id)->get();

        return response()->json(['message' =>'your created is successfully stored','data'=>$event],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $data = Event::find($id);
        if($data){

            $data->update([
                'title' => $request['title'],
                'date' => $request['date'],
                'type' => $request['type'],
                'stadium_id' => $request['stadium_id'],
                'event_id' => $request['event_id'],
            ]);
            $event = Event::with('eventDetails','stadium')->where('id', $data->id)->get();
            return response()->json(['message' =>'your data is updated','data'=>$event],200);
        }
        return response()->json(['message' =>"ID not found"],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $DeleteData = Event::find($id);
        if($DeleteData){

            $DeleteData->destroy($id);
            $data = Event::with('eventDetails','stadium')->get();
            return response()->json(['message' =>'your data is deleted','data'=>$data],200);
        }
        return response()->json(['message' =>"ID not found"],200);
    }

    public function searchByDate(string $search){
        $data = Event::all();
        $result = [];
        for ($i = 0; $i <count($data); $i++) {
            if ($data[$i]->date == $search){
                $events = Event::with('eventDetails','stadium')->where('id',$data[$i]->id)->get();
                array_push($result, $events);	
            }
        }
        return response()->json(['message' =>'This is events we have today','data'=>$result],200);
    }

    public function findeEventBy($title){
        $data = Event::all();
        $events = [];
        for ($i = 0; $i <count($data); $i++) {
            if ($data[$i]->title == $title){
                $events = Event::with('eventDetails','stadium')->where('id',$data[$i]->id)->get();
                array_push($result, $events);	
            }
        }
        return response()->json(['message' =>'This is events','data'=>$events],200);
    }
}
