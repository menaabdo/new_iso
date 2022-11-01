<?php

namespace App\Http\Controllers;

use App\Models\RecordAnalysis;
use App\Models\RecordAnalysisDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class RecordAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_recordAnalysis=RecordAnalysis::with('recordAnalysis')->get();
        return view('recordAnalysis.index',compact('all_recordAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recordAnalysis.create');
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
        $items = RecordAnalysis::create($filterData);
        if ($request->recordAnalysis) {
          $items->recordAnalysis()->createMany($request->recordAnalysis);
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
        $items = RecordAnalysis::create($filterData);
        if ($request->recordAnalysis) {
          $items->recordAnalysis()->createMany($request->recordAnalysis);
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
        $items = RecordAnalysis::create($filterData);
        if ($request->recordAnalysis) {
          $items->recordAnalysis()->createMany($request->recordAnalysis);
      }
    }

      return redirect('recordAnalysis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecordAnalysis  $recordAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(RecordAnalysis $recordAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecordAnalysis  $recordAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $recordAnalysis=RecordAnalysis::with('recordAnalysis')->find($id);
        return view('recordAnalysis.edit',compact('recordAnalysis'));
    }


     public function print($id)
    {
      $recordAnalysis=RecordAnalysis::with('recordAnalysis')->find($id);
       $pdf = PDF::loadView('recordAnalysis.print', compact('recordAnalysis'));
       return $pdf->download('recordAnalysis.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecordAnalysis  $recordAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=RecordAnalysis::find($id);
        if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
     // dd($data);
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
      $data1->status='pending';
        $data1->update($filterData);
        if ($request->recordAnalysis) {
       
          RecordAnalysisDefinition::where('record_analyses_id',$id)->delete();
          $data1->recordAnalysis()->createMany($request->recordAnalysis);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data = $request->all();
      // dd($data);
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
       $data1->status='inProgress';
         $data1->update($filterData);
         if ($request->recordAnalysis) {
        
           RecordAnalysisDefinition::where('record_analyses_id',$id)->delete();
           $data1->recordAnalysis()->createMany($request->recordAnalysis);
       }
    }else{
      $data = $request->all();
      // dd($data);
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
       $data1->status='confirmed';
         $data1->update($filterData);
         if ($request->recordAnalysis) {
        
           RecordAnalysisDefinition::where('record_analyses_id',$id)->delete();
           $data1->recordAnalysis()->createMany($request->recordAnalysis);
       }
    }
      return redirect('recordAnalysis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecordAnalysis  $recordAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $recordAnalysis=RecordAnalysis::find($id);
        $recordAnalysis->recordAnalysis()->forceDelete();
        $recordAnalysis->forceDelete();
        return redirect()->route('recordAnalysis.index');
    }
}
