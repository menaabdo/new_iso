<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecordDefinition;
use App\Models\FollowUpRecordImprovement;
use App\Models\FollowUpRecordImprovementDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class FollowUpRecordImprovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_followUpRecordImprovements=FollowUpRecordImprovement::with('followUpRecord')->get();
        return view('followUpRecordImprovements.index',compact('all_followUpRecordImprovements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('followUpRecordImprovements.create');
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
        $followUpRecordImprovements = FollowUpRecordImprovement::create($filterData);
        if ($request->followUpRecord) {
          $followUpRecordImprovements->followUpRecord()->createMany($request->followUpRecord);
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
              $followUpRecordImprovements = FollowUpRecordImprovement::create($filterData);
              if ($request->followUpRecord) {
                $followUpRecordImprovements->followUpRecord()->createMany($request->followUpRecord);
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
              $followUpRecordImprovements = FollowUpRecordImprovement::create($filterData);
              if ($request->followUpRecord) {
                $followUpRecordImprovements->followUpRecord()->createMany($request->followUpRecord);
            }
        }
      return redirect('followUpRecordImprovements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUpRecordImprovement  $followUpRecordImprovement
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUpRecordImprovement $followUpRecordImprovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowUpRecordImprovement  $followUpRecordImprovement
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $followUpRecordImprovement=FollowUpRecordImprovement::with('followUpRecord')->find($id);
        return view('followUpRecordImprovements.edit',compact('followUpRecordImprovement'));
    }
    public function print($id)
    {
        $followUpRecordImprovement=FollowUpRecordImprovement::with('followUpRecord')->find($id);
        return view('followUpRecordImprovements.print',compact('followUpRecordImprovement'));

    //    $pdf = PDF::loadView('followUpRecordImprovements.print', compact('followUpRecordImprovement'));
    //    return $pdf->download('followUpRecordImprovements.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUpRecordImprovement  $followUpRecordImprovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=FollowUpRecordImprovement::find($id);
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
      $data1->status='pending';
        $data1->update($filterData);
        if ($request->followUpRecord) {
           
          FollowUpRecordImprovementDefinition::where('follow_up_id',$id)->delete();
          $data1->followUpRecord()->createMany($request->followUpRecord);
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
        $data1->status='inProgress';
          $data1->update($filterData);
          if ($request->followUpRecord) {
             
            FollowUpRecordImprovementDefinition::where('follow_up_id',$id)->delete();
            $data1->followUpRecord()->createMany($request->followUpRecord);
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
        $data1->status='confirmed';
          $data1->update($filterData);
          if ($request->followUpRecord) {
             
            FollowUpRecordImprovementDefinition::where('follow_up_id',$id)->delete();
            $data1->followUpRecord()->createMany($request->followUpRecord);
        }
    }
        
      return redirect('followUpRecordImprovements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUpRecordImprovement  $followUpRecordImprovement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $followUpRecordImprovements=FollowUpRecordImprovement::find($id);
        $followUpRecordImprovements->followUpRecord()->forceDelete();
        $followUpRecordImprovements->forceDelete();
        return redirect()->route('followUpRecordImprovements.index');
      }
}
