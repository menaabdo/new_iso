<?php

namespace App\Http\Controllers;

use App\Models\MeetingMinute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class MeetingMinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_meetingMinute=MeetingMinute::get();
      return view('meetingMinute.index',compact('all_meetingMinute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('meetingMinute.create');
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
      $meetingMinute = MeetingMinute::create($data);
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
      $meetingMinute = MeetingMinute::create($data);
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
      $meetingMinute = MeetingMinute::create($data);
    }
      return redirect('meetingMinute');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetingMinute  $meetingMinute
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingMinute $meetingMinute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetingMinute  $meetingMinute
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $meetingMinute=MeetingMinute::find($id);
      return view('meetingMinute.edit',compact('meetingMinute'));
    }


    public function print($id)
    {
     $meetingMinute=MeetingMinute::find($id);
       $pdf = PDF::loadView('meetingMinute.print', compact('meetingMinute'));
       return $pdf->download('meetingMinute.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetingMinute  $meetingMinute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $meetingMinute=MeetingMinute::find($id);
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
      $meetingMinute->status='pending';
      $meetingMinute->update($data);
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
      $meetingMinute->status='inProgress';
      $meetingMinute->update($data);
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
      $meetingMinute->status='confirmed';
      $meetingMinute->update($data);
    }
      return redirect('meetingMinute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetingMinute  $meetingMinute
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $meetingMinute=MeetingMinute::find($id);
      $meetingMinute->forceDelete();
      return redirect()->route('meetingMinute.index');
    }
}
