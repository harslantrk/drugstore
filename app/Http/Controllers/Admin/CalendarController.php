<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\CalendarEvent;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use Auth;

class CalendarController extends Controller
{
    public function __construct(Request $request)
    {
        $url = $request->path();
        Helper::sessionReload();
        $sess= Helper::shout($url);
        $this->read=$sess['r'];
        $this->update=$sess['u'];
        $this->add=$sess['a'];
        $this->delete=$sess['d'];
        $this->sess=$sess;
    }
    public function index()
    {
        $now = Carbon::now();
        $user_id = Auth::user()->id;
        $calendars = CalendarEvent::where('user_id',$user_id)->where('start_time','>=',$now)->get();
        /*echo '<pre>';
        print_r($calendars);
        die();*/
        return view('admin.calendar.index',['calendars'=>$calendars]);
    }

    public function createCalendarModalShow()
    {
        return view('admin.calendar.createCalendarModal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendarModalSave(Request $request)
    {
        $data = $request->all();
        CalendarEvent::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = CalendarEvent::findOrFail($id);

        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);

        $data = [
            'page_title' 	=> $event->title,
            'event'			=> $event,
            'duration'		=> $this->format_interval($difference)
        ];

        return view('event/view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = CalendarEvent::findOrFail($id);
        $event->start_time =  $this->change_date_format_fullcalendar($event->start_time);
        $event->end_time =  $this->change_date_format_fullcalendar($event->end_time);

        $data = [
            'page_title' 	=> 'Edit '.$event->title,
            'event'			=> $event,
        ];

        return view('event/edit', $data);
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
        $this->validate($request, [
            'name'	=> 'required|min:5|max:15',
            'title' => 'required|min:5|max:100',
            'time'	=> 'required'
        ]);

        $time = explode(" - ", $request->input('time'));

        $event 					= CalendarEvent::findOrFail($id);
        $event->name			= $request->input('name');
        $event->title 			= $request->input('title');
        $event->start_time 		= $this->change_date_format($time[0]);
        $event->end_time 		= $this->change_date_format($time[1]);
        $event->save();

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = CalendarEvent::find($id);
        $event->delete();

        return redirect('events');
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }

    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }

    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }

        return $result;
    }
}
