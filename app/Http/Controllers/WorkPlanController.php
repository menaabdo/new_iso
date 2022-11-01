<?php

namespace App\Http\Controllers;

use App\Models\workPlan;
use App\Models\workPlanDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class WorkPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_work_plan=workPlan::with('plan')->get();
      return view('work_plan.index',compact('all_work_plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('work_plan.create');
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $workPlan = workPlan::create($filterData);
        if ($request->plan) {
          $workPlan->plan()->createMany($request->plan);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      $data['status']="inProgress";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $workPlan = workPlan::create($filterData);
        if ($request->plan) {
          $workPlan->plan()->createMany($request->plan);
      }
    }else{
      $data=$request->all();
      $data['status']="confirmed";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $workPlan = workPlan::create($filterData);
        if ($request->plan) {
          $workPlan->plan()->createMany($request->plan);
      }
    }
      return redirect('work_plan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\workPlan  $workPlan
     * @return \Illuminate\Http\Response
     */
    public function show(workPlan $workPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\workPlan  $workPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $work_plan=workPlan::with('plan')->find($id);
      return view('work_plan.edit',compact('work_plan'));
    }


    public function print($id)
    {
       $work_plan=workPlan::with('plan')->find($id);
       $pdf = PDF::loadView('work_plan.print', compact('work_plan'));
       return $pdf->download('work_plan.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\workPlan  $workPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $workPlan=workPlan::find($id);
      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $workPlan->status='pending';
        $workPlan->update($filterData);
        if ($request->plan) {
       
          workPlanDefinition::where('work_plan_id',$id)->delete();
          $workPlan->plan()->createMany($request->plan);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $workPlan->status='inProgress';
        $workPlan->update($filterData);
        if ($request->plan) {
       
          workPlanDefinition::where('work_plan_id',$id)->delete();
          $workPlan->plan()->createMany($request->plan);
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
      $workPlan->status='confirmed';
        $workPlan->update($filterData);
        if ($request->plan) {
       
          workPlanDefinition::where('work_plan_id',$id)->delete();
          $workPlan->plan()->createMany($request->plan);
      }
    }
      return redirect('work_plan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\workPlan  $workPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $workPlan=workPlan::find($id);
      $workPlan->plan()->forceDelete();
      $workPlan->forceDelete();
      return redirect()->route('work_plan.index');
    }
}
