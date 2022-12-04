<?php

namespace App\Http\Controllers;

use App\Models\NonConformanceStats;
use App\Models\NonConformanceStatsDefinition;
use Illuminate\Http\Request;
use PDF;
class NonConformanceStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_nonConformanceStats=NonConformanceStats::with('nonConformanceStats')->get();
        return view('nonConformanceStats.index',compact('all_nonConformanceStats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nonConformanceStats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
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
          $nonConformanceStats = NonConformanceStats::create($filterData);
          if ($request->nonConformanceStats) {
            $nonConformanceStats->nonConformanceStats()->createMany($request->nonConformanceStats);
        }
          
  
        return redirect('nonConformanceStats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nonConformanceStats  $nonConformanceStats
     * @return \Illuminate\Http\Response
     */
    public function show(NonConformanceStats $nonConformanceStats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nonConformanceStats  $nonConformanceStats
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $nonConformanceStats=NonConformanceStats::with('nonConformanceStats')->find($id);
        return view('nonConformanceStats.edit',compact('nonConformanceStats'));
    }


     public function print($id)
    {
     $nonConformanceStats=NonConformanceStats::with('nonConformanceStats')->find($id);
     return view('nonConformanceStats.print',compact('nonConformanceStats'));

    //    $pdf = PDF::loadView('nonConformanceStats.print', compact('nonConformanceStats'));
    //    return $pdf->download('nonConformanceStats.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nonConformanceStats  $nonConformanceStats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=NonConformanceStats::find($id);
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
          $data1->update($filterData);
          if ($request->nonConformanceStats) {
         
            NonConformanceStatsDefinition::where('conformance_id',$id)->delete();
            $data1->nonConformanceStats()->createMany($request->nonConformanceStats);
        }
          
        return redirect('nonConformanceStats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nonConformanceStats  $nonConformanceStats
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $nonConformanceStats=NonConformanceStats::find($id);
        $nonConformanceStats->nonConformanceStats()->forceDelete();
        $nonConformanceStats->forceDelete();
        return redirect()->route('nonConformanceStats.index');
    }
}
