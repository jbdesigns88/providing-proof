<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request){
        $events = Event::orderBy('start','asc')->paginate(10);
        return view('events', ['events' => $events]);

    }
    

    public function show(Request $request,Event $event){
        return view('event-info', ['event' => $event]);
     }

     public function store(EventRequest $request){
        $status = [];
        $start = $start = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start'));
        $end = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end'));
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start' => $request->input('start'),
            'end' => $end->format('Y-m-d H:i:s')
        ];

        try{
            Event::create($data);
            $status = ["success" => "event was successfully created."];
        }
        catch(Exception $ex){
            Log::error( $ex->getMessage() . "The Start and end time is start: $start End: $end old format start: $request->input('start') end:$request->input('end')");
            $status = ["failed" => "event could not be created."];
        }
   
        return redirect()->back()->with($status);
     }
}
