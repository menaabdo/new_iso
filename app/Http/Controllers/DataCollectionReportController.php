<?php

namespace App\Http\Controllers;

use App\Models\DataCollectionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class DataCollectionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_dataCollectionReports=DataCollectionReport::get();
        return view('dataCollectionReports.index',compact('all_dataCollectionReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataCollectionReports.create');
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
        DataCollectionReport::create($data);
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
        DataCollectionReport::create($data);
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
        DataCollectionReport::create($data);
    }
        return redirect('dataCollectionReports');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataCollectionReport  $dataCollectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(DataCollectionReport $dataCollectionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataCollectionReport  $dataCollectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $dataCollectionReport=DataCollectionReport::find($id);
        return view('dataCollectionReports.edit',compact('dataCollectionReport'));
    }
    public function print($id)
    {
        $dataCollectionReport=DataCollectionReport::find($id);
       $pdf = PDF::loadView('dataCollectionReports.print', compact('dataCollectionReport'));
       return $pdf->download('dataCollectionReports.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataCollectionReport  $dataCollectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=DataCollectionReport::find($id);
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
        $data1->status='pending';
        $data1->update($data);
          
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
        $data1->status='inProgress';
        $data1->update($data);
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
        $data1->status='confirmed';
        $data1->update($data);
    }
        return redirect('dataCollectionReports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataCollectionReport  $dataCollectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $dataCollectionReport=DataCollectionReport::find($id);
        $dataCollectionReport->forceDelete();
        return redirect()->route('dataCollectionReports.index');
    }
}
