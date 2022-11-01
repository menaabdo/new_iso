<?php

namespace App\Http\Controllers;

use App\Models\recordAction;
use App\Models\recordActionDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class RecordActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_recordAction=recordAction::with('recordAction')->get();
      return view('recordAction.index',compact('all_recordAction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view(' recordAction.create');
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
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $data['status']="pending";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();

        $recordAction = recordAction::create($filterData);
        if ($request->recordAction) {
          $recordAction->recordAction()->createMany($request->recordAction);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $data['status']="inProgress";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $recordAction = recordAction::create($filterData);
        if ($request->recordAction) {
          $recordAction->recordAction()->createMany($request->recordAction);
      }
    }else{
      $data=$request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $data['status']="confirmed";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $recordAction = recordAction::create($filterData);
        if ($request->recordAction) {
          $recordAction->recordAction()->createMany($request->recordAction);
      }
    }

      return redirect('recordAction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function show(recordAction $recordAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $recordAction=recordAction::with('recordAction')->find($id);
      return view('recordAction.edit',compact('recordAction'));
    }


      public function print($id)
    {
        $recordAction=recordAction::with('recordAction')->find($id);
       $pdf = PDF::loadView('recordAction.print', compact('recordAction'));
       return $pdf->download('recordAction.pdf');  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $recordAction=recordAction::find($id);
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
        $recordAction->status='pending';
        $recordAction->update($filterData);
        if ($request->recordAction) {
       
          recordActionDefinition::where('record_action_id',$id)->delete();
          $recordAction->recordAction()->createMany($request->recordAction);
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
      $recordAction->status='inProgress';
        $recordAction->update($filterData);
        if ($request->recordAction) {
       
          recordActionDefinition::where('record_action_id',$id)->delete();
          $recordAction->recordAction()->createMany($request->recordAction);
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
        $recordAction->status='confirmed';
        $recordAction->update($filterData);
        if ($request->recordAction) {
       
          recordActionDefinition::where('record_action_id',$id)->delete();
          $recordAction->recordAction()->createMany($request->recordAction);
      }
    }
      return redirect('recordAction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $recordAction=recordAction::find($id);
      $recordAction->recordAction()->forceDelete();
      $recordAction->forceDelete();
      return redirect()->route('recordAction.index');
    }
}
