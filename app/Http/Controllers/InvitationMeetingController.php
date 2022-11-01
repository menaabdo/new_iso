<?php

namespace App\Http\Controllers;

use App\Models\InvitationMeeting;
use App\Models\InvitationMeetingDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class InvitationMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_invitationMeeting=InvitationMeeting::with('invetationMeeting')->get();
      return view('invitationMeeting.index',compact('all_invitationMeeting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('invitationMeeting.create');
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
        $invitationMeeting = InvitationMeeting::create($filterData);
        if ($request->invetation) {
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
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
        $invitationMeeting = InvitationMeeting::create($filterData);
        if ($request->invetation) {
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
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
        $invitationMeeting = InvitationMeeting::create($filterData);
        if ($request->invetation) {
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
      }
    }

      return redirect('invitationMeeting');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvitationMeeting  $invitationMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(InvitationMeeting $invitationMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvitationMeeting  $invitationMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $invitationMeeting=InvitationMeeting::with('invetationMeeting')->find($id);
      return view('invitationMeeting.edit',compact('invitationMeeting'));
    }

    public function print($id)
    {
       $invitationMeeting=InvitationMeeting::with('invetationMeeting')->find($id);
       $pdf = PDF::loadView('invitationMeeting.print', compact('invitationMeeting'));
       return $pdf->download('invitationMeeting.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvitationMeeting  $invitationMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
      $invitationMeeting=InvitationMeeting::find($id);
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
      $invitationMeeting->status='pending';
        $invitationMeeting->update($filterData);
        if ($request->invetation) {
       
          InvitationMeetingDefinition::where('invitation_meeting_id',$id)->delete();
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
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
      $invitationMeeting->status='inProgress';
        $invitationMeeting->update($filterData);
        if ($request->invetation) {
       
          InvitationMeetingDefinition::where('invitation_meeting_id',$id)->delete();
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
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
      $invitationMeeting->status='confirmed';
        $invitationMeeting->update($filterData);
        if ($request->invetation) {
       
          InvitationMeetingDefinition::where('invitation_meeting_id',$id)->delete();
          $invitationMeeting->invetationMeeting()->createMany($request->invetation);
      }
    }
      return redirect('invitationMeeting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvitationMeeting  $invitationMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $invitationMeeting=InvitationMeeting::find($id);
      $invitationMeeting->invetationMeeting()->forceDelete();
      $invitationMeeting->forceDelete();
      return redirect()->route('invitationMeeting.index');
    }
}
