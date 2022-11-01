<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use Illuminate\Http\Request;
use PDF;
class AssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_assigned=Assigned::get();
      return view('assigned.index',compact('all_assigned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('assigned.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      Assigned::create($data);
      return redirect('assigned');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function show(Assigned $assigned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $assigned=Assigned::find($id);
      return view('assigned.edit',compact('assigned'));
    }
     public function print($id)
    {
      $assigned=Assigned::find($id);
       $pdf = PDF::loadView('assigned.print', compact('assigned'));
       return $pdf->download('assigned.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $assigned=Assigned::find($id);
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $assigned->update($data);
      return redirect('assigned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $assigned=Assigned::find($id);
      $assigned->forceDelete();
      return redirect()->route('assigned.index');
    }
}