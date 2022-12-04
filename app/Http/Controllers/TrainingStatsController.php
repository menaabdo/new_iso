<?php

namespace App\Http\Controllers;

use App\Models\TrainingStats;
use App\Models\TrainingStatsDefinition;
use Illuminate\Http\Request;
use PDF;
class TrainingStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_trainingStats=TrainingStats::with('trainingStats')->get();
        return view('trainingStats.index',compact('all_trainingStats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainingStats.create');
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
          $trainingStats = TrainingStats::create($filterData);
          if ($request->trainingStats) {
            $trainingStats->trainingStats()->createMany($request->trainingStats);
        }
          
  
        return redirect('trainingStats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingStats  $trainingStats
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingStats $trainingStats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingStats  $trainingStats
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $trainingStats=TrainingStats::with('trainingStats')->find($id);
        return view('trainingStats.edit',compact('trainingStats'));
    }

    public function print($id)
    {
       $trainingStats=TrainingStats::with('trainingStats')->find($id);
       return view('trainingStats.print',compact('trainingStats'));

    //    $pdf = PDF::loadView('trainingStats.print', compact('trainingStats'));
    //    return $pdf->download('trainingStats.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingStats  $trainingStats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=TrainingStats::find($id);
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
          if ($request->trainingStats) {
         
            TrainingStatsDefinition::where('training_stats_id',$id)->delete();
            $data1->trainingStats()->createMany($request->trainingStats);
        }
          
        return redirect('trainingStats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingStats  $trainingStats
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $trainingStats=TrainingStats::find($id);
        $trainingStats->trainingStats()->forceDelete();
        $trainingStats->forceDelete();
        return redirect()->route('trainingStats.index');
    }
}
