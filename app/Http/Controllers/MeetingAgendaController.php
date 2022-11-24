<?php

namespace App\Http\Controllers;

use App\Models\MeetingAgenda;
use App\Models\MeetingAgendaDefinition;
use App\Models\TopicDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class MeetingAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_meetingAgenda=MeetingAgenda::with('attendance','topic')->get();
      return view('meetingAgenda.index',compact('all_meetingAgenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('meetingAgenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::user()->hasRole('Employee')){
      $data=$request->all();
      $data['status']="pending";
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $meetingAgenda = MeetingAgenda::create($filterData);
        if ($request->attendance) {
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      $data['status']="inProgress";
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $meetingAgenda = MeetingAgenda::create($filterData);
        if ($request->attendance) {
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }else{
      $data=$request->all();
      $data['status']="confirmed";
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $meetingAgenda = MeetingAgenda::create($filterData);
        if ($request->attendance) {
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }

      return redirect('meetingAgenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetingAgenda  $meetingAgenda
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingAgenda $meetingAgenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetingAgenda  $meetingAgenda
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $meetingAgenda=MeetingAgenda::with('attendance','topic')->find($id);
      return view('meetingAgenda.edit',compact('meetingAgenda'));
    }

    public function print($id)
    {
       $meetingAgenda=MeetingAgenda::with('attendance','topic')->find($id);
       $pdf = PDF::loadView('meetingAgenda.print', compact('meetingAgenda'));
       return $pdf->download('meetingAgenda.docs');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetingAgenda  $meetingAgenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $meetingAgenda=MeetingAgenda::find($id);

      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $meetingAgenda->status='pending';
        $meetingAgenda->update($filterData);
        if ($request->attendance) {
       
          MeetingAgendaDefinition::where('meeting_agenda_id',$id)->delete();
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
       
          TopicDefinition::where('meeting_agenda_id',$id)->delete();
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $meetingAgenda->status='inProgress';
        $meetingAgenda->update($filterData);
        if ($request->attendance) {
       
          MeetingAgendaDefinition::where('meeting_agenda_id',$id)->delete();
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
       
          TopicDefinition::where('meeting_agenda_id',$id)->delete();
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }else{
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $meetingAgenda->status='confirmed';
        $meetingAgenda->update($filterData);
        if ($request->attendance) {
       
          MeetingAgendaDefinition::where('meeting_agenda_id',$id)->delete();
          $meetingAgenda->attendance()->createMany($request->attendance);
      }
        if ($request->topics) {
         
       
          TopicDefinition::where('meeting_agenda_id',$id)->delete();
//dd( $meetingAgenda->topic());
          $meetingAgenda->topic()->createMany($request->topics);
      }
    }
      return redirect('meetingAgenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetingAgenda  $meetingAgenda
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $MeetingAgenda=MeetingAgenda::find($id);
      $MeetingAgenda->topic()->forceDelete();
      $MeetingAgenda->attendance()->forceDelete();
      $MeetingAgenda->forceDelete();
      return redirect()->route('meetingAgenda.index');
    }
}
