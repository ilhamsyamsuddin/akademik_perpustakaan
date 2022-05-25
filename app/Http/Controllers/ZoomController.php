<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use \MacsiDigital\Zoom\Facades\Zoom;
use App\Models\zoom_class;
//app\Models\zoom_class;
use App\Http\Traits\MeetingZoomTrait;
class ZoomController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = zoom_class::all();
        return view('backend.zoom_class.index',[
            'classes' => $classes
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.zoom_class.create');
        //return('DOne');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $meeting = $this->createMeeting($request);
        $zoom = new zoom_class;
        $zoom->category_id = $request->category;
        $zoom->meeting_id = $meeting->id;
        $zoom->topic = $request->topic;
        $zoom->start_at = $request->start_time;
        $zoom->duration = $meeting->duration;
        $zoom->password = $meeting->password;
        $zoom->start_url = $meeting->start_url;
        $zoom->join_url = $meeting->join_url;
        
        $zoom->save();
        return redirect('/zoom');
    }
    public function createZoom(Request $request)
    {
        /**
        *
        * Membuat Meeting Baru
        */
        $meetings = Zoom::user()->find('ilham5442@gmail.com')->meetings()->create([
            'topic' => 'Test Create Meeting',
            'duration' => 15, // In minutes, optional
            'start_time' => new Carbon('2022-10-10 03:00:00'),
            'timezone' => 'Asia/Jakarta',
        ]);
        return [$meetings];
    }
  
}
