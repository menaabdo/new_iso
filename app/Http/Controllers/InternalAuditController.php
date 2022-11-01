<?php

namespace App\Http\Controllers;

use App\Models\InternalAudit;
use App\Models\InternalAuditDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class InternalAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_internalAudit=InternalAudit::with('internalAudit')->get();
      return view('internalAudit.index',compact('all_internalAudit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('internalAudit.create');
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $data['status']="pending";
        $internalAudit = InternalAudit::create($filterData);
        if ($request->internalAudit) {
          $internalAudit->internalAudit()->createMany($request->internalAudit);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $data['status']="inProgress";
        $internalAudit = InternalAudit::create($filterData);
        if ($request->internalAudit) {
          $internalAudit->internalAudit()->createMany($request->internalAudit);
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
        $internalAudit = InternalAudit::create($filterData);
        if ($request->internalAudit) {
          $internalAudit->internalAudit()->createMany($request->internalAudit);
      }
    }
      return redirect('internalAudit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalAudit  $internalAudit
     * @return \Illuminate\Http\Response
     */
    public function show(InternalAudit $internalAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalAudit  $internalAudit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $internalAudit=InternalAudit::with('internalAudit')->find($id);
      return view('internalAudit.edit',compact('internalAudit'));
    }

    public function print($id)
    {
       $internalAudit=InternalAudit::with('internalAudit')->find($id);
       $pdf = PDF::loadView('internalAudit.print', compact('internalAudit'));
       return $pdf->download('internalAudit.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalAudit  $internalAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $internalAudit=InternalAudit::find($id);
      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $internalAudit->status='pending';
        $internalAudit->update($filterData);
        if ($request->internalAudit) {
       
          InternalAuditDefinition::where('internal_audit_id',$id)->delete();
          $internalAudit->internalAudit()->createMany($request->internalAudit);
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
      $internalAudit->status='inProgress';
        $internalAudit->update($filterData);
        if ($request->internalAudit) {
       
          InternalAuditDefinition::where('internal_audit_id',$id)->delete();
          $internalAudit->internalAudit()->createMany($request->internalAudit);
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
      $internalAudit->status='confirmed';
        $internalAudit->update($filterData);
        if ($request->internalAudit) {
       
          InternalAuditDefinition::where('internal_audit_id',$id)->delete();
          $internalAudit->internalAudit()->createMany($request->internalAudit);
      }
    }
      return redirect('internalAudit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalAudit  $internalAudit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $internalAudit=InternalAudit::find($id);
      $internalAudit->forceDelete();
      return redirect()->route('internalAudit.index');
    }
}
