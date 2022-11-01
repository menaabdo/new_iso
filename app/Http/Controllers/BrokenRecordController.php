<?php

namespace App\Http\Controllers;

use App\Models\BrokenRecord;
use App\Models\BrokenRecordDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class BrokenRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_brokenRecord=BrokenRecord::with('brokenRecord')->get();
      return view('brokenRecord.index',compact('all_brokenRecord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('brokenRecord.create');
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
        $brokenRecord = BrokenRecord::create($filterData);
        if ($request->brokenRecord) {
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
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
        $brokenRecord = BrokenRecord::create($filterData);
        if ($request->brokenRecord) {
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
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
        $brokenRecord = BrokenRecord::create($filterData);
        if ($request->brokenRecord) {
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
      }
    }

      return redirect('brokenRecord');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrokenRecord  $brokenRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BrokenRecord $brokenRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrokenRecord  $brokenRecord
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $brokenRecord=BrokenRecord::with('brokenRecord')->find($id);
      return view('brokenRecord.edit',compact('brokenRecord'));
    }

    public function print($id)
    {
     
      $brokenRecord=BrokenRecord::with('brokenRecord')->find($id);
       $pdf = PDF::loadView('brokenRecord.print', compact('brokenRecord'));
       return $pdf->download('brokenRecord.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrokenRecord  $brokenRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $brokenRecord=BrokenRecord::find($id);
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
        $brokenRecord->status='pending';
        $brokenRecord->update($filterData);
        if ($request->brokenRecord) {
       
          BrokenRecordDefinition::where('broken_record_id',$id)->delete();
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
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
      $brokenRecord->status='inProgress';
        $brokenRecord->update($filterData);
        if ($request->brokenRecord) {
       
          BrokenRecordDefinition::where('broken_record_id',$id)->delete();
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
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
      $brokenRecord->status='confirmed';
        $brokenRecord->update($filterData);
        if ($request->brokenRecord) {
       
          BrokenRecordDefinition::where('broken_record_id',$id)->delete();
          $brokenRecord->brokenRecord()->createMany($request->brokenRecord);
      }
    }
        
      return redirect('brokenRecord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrokenRecord  $brokenRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $brokenRecord=BrokenRecord::find($id);
      $brokenRecord->brokenRecord()->forceDelete();
      $brokenRecord->forceDelete();
      return redirect()->route('brokenRecord.index');
    }
}
