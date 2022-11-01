<?php

namespace App\Http\Controllers;

use App\Models\IssuanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class IssuanceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_issuanceRequest=IssuanceRequest::get();
      return view('issuanceRequest.index',compact('all_issuanceRequest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('issuanceRequest.create');
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
        IssuanceRequest::create($data);
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
        IssuanceRequest::create($data);
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
        IssuanceRequest::create($data);
    }
     
      return redirect('issuanceRequest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssuanceRequest  $issuanceRequest
     * @return \Illuminate\Http\Response
     */
    public function show(IssuanceRequest $issuanceRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssuanceRequest  $issuanceRequest
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $issuanceRequest=IssuanceRequest::find($id);
      return view('issuanceRequest.edit',compact('issuanceRequest'));
    }


    public function print($id)
    {
       $issuanceRequest=IssuanceRequest::find($id);
       $pdf = PDF::loadView('issuanceRequest.print', compact('issuanceRequest'));
       return $pdf->download('issuanceRequest.pdf');  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IssuanceRequest  $issuanceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

      $data1= IssuanceRequest::find($id);
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
      return redirect('issuanceRequest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssuanceRequest  $issuanceRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $issuanceRequest=IssuanceRequest::find($id);
      $issuanceRequest->forceDelete();
      return redirect()->route('issuanceRequest.index');
    }
}
