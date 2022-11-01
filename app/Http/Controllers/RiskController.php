<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_risk=Risk::with('risk')->get();
      return view('risk.index',compact('all_risk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('risk.create');
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $risk = Risk::create($filterData);
        if ($request->risk) {
          $risk->risk()->createMany($request->risk);
      }

      return redirect('risk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function show(Risk $risk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $risk=Risk::with('risk')->find($id);
      return view('risk.edite',compact('risk'));
    }

    public function print($id)
    {
      $risk=Risk::with('risk')->find($id);
       $pdf = PDF::loadView('risk.print', compact('risk'));
       return $pdf->download('risk.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $risk=Risk::find($id);
      if(Auth::user()->hasRole('SuperAdmin')){
        $data = $request->all();
        $filterData = collect($data)
        ->filter(function ($item) {
            if (!is_array($item)) {
                return $item;
            }
        })
        ->toArray();
        $risk->status='confirmed';
          $risk->update($filterData);
          if ($request->risk) {
            RiskDefinition::where('risk_id',$id)->delete();
            $risk->risk()->createMany($request->risk);
        }
      }else{
        $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $risk->update($filterData);
        if ($request->risk) {
          RiskDefinition::where('risk_id',$id)->delete();
          $risk->risk()->createMany($request->risk);
      }
      }
      
      return redirect('risk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Risk  $risk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $risk=Risk::find($id);
      $risk->forceDelete();
      return redirect()->route('risk.index');
    }
}
