<?php

namespace App\Http\Controllers;

use App\Models\NonConformities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class NonConformitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_Non_conformities=NonConformities::get();
        return view('Non_conformities.index',compact('all_Non_conformities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Non_conformities.create');
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
      $data['effectively_implemented']=$request->boolean('effectively_implemented');
      $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
      $Non_conformities = NonConformities::create($data);
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
        $data['effectively_implemented']=$request->boolean('effectively_implemented');
        $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
        $Non_conformities = NonConformities::create($data);
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
        $data['effectively_implemented']=$request->boolean('effectively_implemented');
        $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
        $Non_conformities = NonConformities::create($data);
    }
      return redirect('Non_conformities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NonConformities  $nonConformities
     * @return \Illuminate\Http\Response
     */
    public function show(NonConformities $nonConformities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonConformities  $nonConformities
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $Non_conformities=NonConformities::find($id);
        return view('Non_conformities.edit',compact('Non_conformities'));
    }

    public function print($id)
    {
    $Non_conformities=NonConformities::find($id);
    return view('Non_conformities.print',compact('Non_conformities'));

    //    $pdf = PDF::loadView('Non_conformities.print', compact('Non_conformities'));
    //    return $pdf->download('Non_conformities.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonConformities  $nonConformities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $Non_conformities=NonConformities::find($id);
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
      $data['effectively_implemented']=$request->boolean('effectively_implemented');
      $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
      $Non_conformities->status='pending';
      $Non_conformities->update($data);
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
        $data['effectively_implemented']=$request->boolean('effectively_implemented');
        $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
        $Non_conformities->status='inProgress';
        $Non_conformities->update($data);
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
        $data['effectively_implemented']=$request->boolean('effectively_implemented');
        $data['implemented_needs_corrective']=$request->boolean('implemented_needs_corrective');
        $Non_conformities->status='confirmed';
        $Non_conformities->update($data);
    }
      return redirect('Non_conformities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonConformities  $nonConformities
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Non_conformities=NonConformities::find($id);
      $Non_conformities->forceDelete();
      return redirect()->route('Non_conformities.index');
    }
}
