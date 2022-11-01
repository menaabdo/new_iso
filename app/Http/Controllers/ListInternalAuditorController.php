<?php

namespace App\Http\Controllers;

use App\Models\ListInternalAuditor;
use App\Models\ListInternalAuditorDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ListInternalAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_listInternalAuditor=ListInternalAuditor::with('list')->get();
      return view('listInternalAuditor.index',compact('all_listInternalAuditor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('listInternalAuditor.create');
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
      
        $listInternalAuditor = ListInternalAuditor::create($filterData);
        if ($request->list) {
          $listInternalAuditor->list()->createMany($request->list);
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
        $listInternalAuditor = ListInternalAuditor::create($filterData);
        if ($request->list) {
          $listInternalAuditor->list()->createMany($request->list);
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
        $listInternalAuditor = ListInternalAuditor::create($filterData);
        if ($request->list) {
          $listInternalAuditor->list()->createMany($request->list);
      }
    }
      return redirect('listInternalAuditor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListInternalAuditor  $listInternalAuditor
     * @return \Illuminate\Http\Response
     */
    public function show(ListInternalAuditor $listInternalAuditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListInternalAuditor  $listInternalAuditor
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $listInternalAuditor=ListInternalAuditor::with('list')->find($id);
      return view('listInternalAuditor.edit',compact('listInternalAuditor'));
    }

    public function print($id)
    {
       $listInternalAuditor=ListInternalAuditor::with('list')->find($id);
       $pdf = PDF::loadView('listInternalAuditor.print', compact('listInternalAuditor'));
       return $pdf->download('listInternalAuditor.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListInternalAuditor  $listInternalAuditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $listInternalAuditor=ListInternalAuditor::find($id);
      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $listInternalAuditor->status='pending';
        $listInternalAuditor->update($filterData);
        if ($request->list) {
       
          ListInternalAuditorDefinition::where('list_auditor_id',$id)->delete();
          $listInternalAuditor->list()->createMany($request->list);
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
      $listInternalAuditor->status='inProgress';
        $listInternalAuditor->update($filterData);
        if ($request->list) {
       
          ListInternalAuditorDefinition::where('list_auditor_id',$id)->delete();
          $listInternalAuditor->list()->createMany($request->list);
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
      $listInternalAuditor->status='confirmed';
        $listInternalAuditor->update($filterData);
        if ($request->list) {
       
          ListInternalAuditorDefinition::where('list_auditor_id',$id)->delete();
          $listInternalAuditor->list()->createMany($request->list);
      }
    }
      return redirect('listInternalAuditor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListInternalAuditor  $listInternalAuditor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $internalAudit=ListInternalAuditor::find($id);
      $internalAudit->list()->forceDelete();
      $internalAudit->forceDelete();
      return redirect()->route('listInternalAuditor.index');
    }
}
