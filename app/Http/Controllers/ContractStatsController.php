<?php

namespace App\Http\Controllers;

use App\Models\ContractStats;
use App\Models\ContractStatsDefinition;
use Illuminate\Http\Request;
use PDF;
class ContractStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_contractStats=ContractStats::with('contractStats')->get();
        return view('contractStats.index',compact('all_contractStats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contractStats.create');
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
          $contractStats = ContractStats::create($filterData);
          if ($request->contractStats) {
            $contractStats->contractStats()->createMany($request->contractStats);
        }
          
  
        return redirect('contractStats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContractStats  $contractStats
     * @return \Illuminate\Http\Response
     */
    public function show(ContractStats $contractStats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContractStats  $contractStats
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contractStats=ContractStats::with('contractStats')->find($id);
        return view('contractStats.edit',compact('contractStats'));
    }

    public function print($id)
    {
       $contractStats=ContractStats::with('contractStats')->find($id);
       return view('contractStats.print',compact('contractStats'));

    //    $pdf = PDF::loadView('contractStats.print', compact('contractStats'));
    //    return $pdf->download('contractStats.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContractStats  $contractStats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=ContractStats::find($id);
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
        if ($request->contractStats) {
       
          ContractStatsDefinition::where('contract_stats_id',$id)->delete();
          $data1->contractStats()->createMany($request->contractStats);
      }
        
      return redirect('contractStats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContractStats  $contractStats
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contractStats=ContractStats::find($id);
        $contractStats->contractStats()->forceDelete();
        $contractStats->forceDelete();
        return redirect()->route('contractStats.index');
    }
}
