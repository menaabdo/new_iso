<?php

namespace App\Http\Controllers;

use App\Models\InternalAuditReport;
use Illuminate\Http\Request;
use PDF;
class InternalAuditReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_InternalAuditReport=InternalAuditReport::get();
      return view('internalAuditReport.index',compact('all_InternalAuditReport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('internalAuditReport.create');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      InternalAuditReport::create($request->all());
      return redirect('InternalAuditReport');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalAuditReport  $internalAuditReport
     * @return \Illuminate\Http\Response
     */
    public function show(InternalAuditReport $internalAuditReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalAuditReport  $internalAuditReport
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $internalAuditReport=InternalAuditReport::find($id);
      return view('internalAuditReport.edit',compact('internalAuditReport'));
    }

    public function print($id)
    {
       $internalAuditReport=InternalAuditReport::find($id);
       return view('internalAuditReport.print',compact('internalAuditReport'));

      //  $pdf = PDF::loadView('internalAuditReport.print', compact('internalAuditReport'));
      //  return $pdf->download('internalAuditReport.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalAuditReport  $internalAuditReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $InternalAuditReport=InternalAuditReport::find($id);
      $data = $request->all();
      $InternalAuditReport->update($data);
      return redirect('InternalAuditReport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalAuditReport  $internalAuditReport
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $InternalAuditReport=InternalAuditReport::find($id);
      $InternalAuditReport->forceDelete();
      return redirect()->route('InternalAuditReport.index');
    }
}
