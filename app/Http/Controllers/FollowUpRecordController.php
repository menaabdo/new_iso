<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\FollowUpRecordDefinition;
use Illuminate\Http\Request;
use PDF;
class FollowUpRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_followUpRecord=FollowUpRecord::with('followUpRecord')->get();
        return view('followUpRecord.index',compact('all_followUpRecord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('followUpRecord.create');
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
        $followUpRecord = FollowUpRecord::create($filterData);
        if ($request->followUpRecord) {
          $followUpRecord->followUpRecord()->createMany($request->followUpRecord);
      }
        

      return redirect('followUpRecord');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUpRecord  $followUpRecord
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUpRecord $followUpRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowUpRecord  $followUpRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $followUpRecord=FollowUpRecord::with('followUpRecord')->find($id);
      return view('followUpRecord.edit',compact('followUpRecord'));
    }

    public function print($id)
    {
        $followUpRecord=FollowUpRecord::with('followUpRecord')->find($id);
        return view('followUpRecord.print',compact('followUpRecord'));

      //  $pdf = PDF::loadView('followUpRecord.print', compact('followUpRecord'));
      //  return $pdf->download('followUpRecord.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUpRecord  $followUpRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $followUpRecord=FollowUpRecord::find($id);
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $followUpRecord->update($filterData);
        if ($request->followUpRecord) {
       
          FollowUpRecordDefinition::where('follow_up_record_id',$id)->delete();
          $followUpRecord->followUpRecord()->createMany($request->followUpRecord);
      }
      return redirect('followUpRecord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUpRecord  $followUpRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $followUpRecord=FollowUpRecord::find($id);
      $followUpRecord->followUpRecord()->forceDelete();
      $followUpRecord->forceDelete();
      return redirect()->route('followUpRecord.index');
    }
}
