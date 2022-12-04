<?php

namespace App\Http\Controllers;

use App\Models\InternalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class InternalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_internalCases=InternalCase::get();
        return view('internalCase.index',compact('all_internalCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internalCase.create');
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
      $internalCase = InternalCase::create($data);
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
        $internalCase = InternalCase::create($data);
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
        $internalCase = InternalCase::create($data);
    }
      return redirect('internalCases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalCase  $internalCase
     * @return \Illuminate\Http\Response
     */
    public function show(InternalCase $internalCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalCase  $internalCase
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $internalCases=InternalCase::find($id);
        return view('internalCase.edit',compact('internalCases'));
    }

    public function print($id)
    {
       $internalCases=InternalCase::find($id);
       return view('internalCase.print',compact('internalCases'));

    //    $pdf = PDF::loadView('internalCase.print', compact('internalCases'));
    //    return $pdf->download('internalCase.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalCase  $internalCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $internalCase=InternalCase::find($id);
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
        $internalCase->status='pending';
        $internalCase->update($data);
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
        $internalCase->status='inProgress';
        $internalCase->update($data);
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
        $internalCase->status='confirmed';
        $internalCase->update($data);
    }
        return redirect('internalCases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalCase  $internalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $internalCase=InternalCase::find($id);
        $internalCase->forceDelete();
        return redirect()->route('internalCases.index');
    }
}
