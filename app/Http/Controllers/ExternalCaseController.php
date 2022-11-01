<?php

namespace App\Http\Controllers;

use App\Models\ExternalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ExternalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_externalCases=ExternalCase::get();
        return view('externalCase.index',compact('all_externalCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('externalCase.create');
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
      $ExternalCase = ExternalCase::create($data);
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
        $ExternalCase = ExternalCase::create($data);
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
        $ExternalCase = ExternalCase::create($data);
    }
      return redirect('externalCases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalCase  $ExternalCase
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalCase $ExternalCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalCase  $ExternalCase
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $externalCase=ExternalCase::find($id);
        return view('externalCase.edit',compact('externalCase'));
    }

    public function print($id)
    {
       $externalCase=ExternalCase::find($id);
       $pdf = PDF::loadView('externalCase.print', compact('externalCase'));
       return $pdf->download('externalCase.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalCase  $ExternalCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $externalCase=ExternalCase::find($id);
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
        $externalCase->status='pending';
        $externalCase->update($data);
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
        $externalCase->status='inProgress';
        $externalCase->update($data);
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
        $externalCase->status='confirmed';
        $externalCase->update($data);
    }
        return redirect('externalCases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalCase  $ExternalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $externalCase=ExternalCase::find($id);
        $externalCase->forceDelete();
        return redirect()->route('externalCases.index');
    }
}
