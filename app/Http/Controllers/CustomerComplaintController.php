<?php

namespace App\Http\Controllers;

use App\Models\CustomerComplaint;
use Illuminate\Http\Request;
use PDF;
class CustomerComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_customerComplaints=CustomerComplaint::get();
        return view('customerComplaint.index',compact('all_customerComplaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerComplaint.create');
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
        CustomerComplaint::create($data);
        return redirect('customerComplaints');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerComplaint $customerComplaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customerComplaint=CustomerComplaint::find($id);
        return view('customerComplaint.edit',compact('customerComplaint'));
    }

    public function print($id)
    {
       $customerComplaint=CustomerComplaint::find($id);
       $pdf = PDF::loadView('customerComplaint.print', compact('customerComplaint'));
       return $pdf->download('customerComplaint.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=CustomerComplaint::find($id);
        $data = $request->all();
        if($request->hasfile('logo')) 
        {
             $image = $request->file('logo');
              $image_name = $image->getClientOriginalName();
              $image->move(public_path('/image'),$image_name);
              $image_path = "/image/" . $image_name;
              $data['logo']=$image_path;
        }
        $data1->update($data);
          
          
        return redirect('customerComplaints');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customerComplaint=CustomerComplaint::find($id);
        $customerComplaint->forceDelete();
        return redirect()->route('customerComplaints.index');
    }
}
