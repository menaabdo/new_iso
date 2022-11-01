<?php

namespace App\Http\Controllers;

use App\Models\NonConformanceReport;
use App\Models\NonConformanceReportDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class NonConformanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_nonConformanceReport=NonConformanceReport::with('nonConformanceReport')->get();
        return view('nonConformanceReport.index',compact('all_nonConformanceReport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nonConformanceReport.create');
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
          $nonConformanceReport = NonConformanceReport::create($filterData);
          if ($request->nonConformanceReport) {
            $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
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

      $nonConformanceReport = NonConformanceReport::create($filterData);
      if ($request->nonConformanceReport) {
        $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
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
      $nonConformanceReport = NonConformanceReport::create($filterData);
      if ($request->nonConformanceReport) {
        $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
    }
}
        return redirect('nonConformanceReport');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NonConformanceReport  $nonConformanceReport
     * @return \Illuminate\Http\Response
     */
    public function show(NonConformanceReport $nonConformanceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonConformanceReport  $nonConformanceReport
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $nonConformanceReport=NonConformanceReport::with('nonConformanceReport')->find($id);
      return view('nonConformanceReport.edit',compact('nonConformanceReport'));
    }


    public function print($id)
    {
     $nonConformanceReport=NonConformanceReport::with('nonConformanceReport')->find($id);
       $pdf = PDF::loadView('nonConformanceReport.print', compact('nonConformanceReport'));
       return $pdf->download('nonConformanceReport.pdf');  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonConformanceReport  $nonConformanceReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $nonConformanceReport=NonConformanceReport::find($id);
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
      $nonConformanceReport->status='pending';
        $nonConformanceReport->update($filterData);
        if ($request->nonConformanceReport) {
       
          NonConformanceReportDefinition::where('conformance_report_id',$id)->delete();
          $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
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
        $nonConformanceReport->status='inProgress';
          $nonConformanceReport->update($filterData);
          if ($request->nonConformanceReport) {
         
            NonConformanceReportDefinition::where('conformance_report_id',$id)->delete();
            $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
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
        $nonConformanceReport->status='confirmed';
          $nonConformanceReport->update($filterData);
          if ($request->nonConformanceReport) {
         
            NonConformanceReportDefinition::where('conformance_report_id',$id)->delete();
            $nonConformanceReport->nonConformanceReport()->createMany($request->nonConformanceReport);
        }
    }
      return redirect('nonConformanceReport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonConformanceReport  $nonConformanceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $nonConformanceReport=NonConformanceReport::find($id);
        $nonConformanceReport->nonConformanceReport()->forceDelete();
        $nonConformanceReport->forceDelete();
        return redirect()->route('nonConformanceReport.index');
    }
}
