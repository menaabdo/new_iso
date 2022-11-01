<?php

namespace App\Http\Controllers;

use App\Models\FollowLog;
use App\Models\FollowLogDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class FollowLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_followLog=FollowLog::with('follow')->get();
      return view('followLog.index',compact('all_followLog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('followLog.create');
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
        $followLog = FollowLog::create($filterData);
        if ($request->follow) {
          $followLog->follow()->createMany($request->follow);
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
        $followLog = FollowLog::create($filterData);
        if ($request->follow) {
          $followLog->follow()->createMany($request->follow);
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
        $followLog = FollowLog::create($filterData);
        if ($request->follow) {
          $followLog->follow()->createMany($request->follow);
      }
    }


      return redirect('followLog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowLog  $followLog
     * @return \Illuminate\Http\Response
     */
    public function show(FollowLog $followLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowLog  $followLog
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $followLog=FollowLog::with('follow')->find($id);
      return view('followLog.edit',compact('followLog'));
    }

     public function print($id)
    {
       $followLog=FollowLog::with('follow')->find($id);
       $pdf = PDF::loadView('followLog.print', compact('followLog'));
       return $pdf->download('followLog.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowLog  $followLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $followLog=FollowLog::find($id);
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
        $followLog->status='pending';
        $followLog->update($filterData);
        if ($request->follow) {
       
          FollowLogDefinition::where('follow_log_id',$id)->delete();
          $followLog->follow()->createMany($request->follow);
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
      $followLog->status='inProgress';
        $followLog->update($filterData);
        if ($request->follow) {
       
          FollowLogDefinition::where('follow_log_id',$id)->delete();
          $followLog->follow()->createMany($request->follow);
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
        $followLog->status='confirmed';
        $followLog->update($filterData);
        if ($request->follow) {
       
          FollowLogDefinition::where('follow_log_id',$id)->delete();
          $followLog->follow()->createMany($request->follow);
      }
    }
      return redirect('followLog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowLog  $followLog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $followLog=FollowLog::find($id);
      $followLog->follow()->forceDelete();
      $followLog->forceDelete();
      return redirect()->route('followLog.index');
    }
}
