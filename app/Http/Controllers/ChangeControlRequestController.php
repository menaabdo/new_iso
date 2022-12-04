<?php

namespace App\Http\Controllers;

use App\Models\AffectedDocumentDefinition;
use App\Models\ChangeControlRequest;
use Illuminate\Http\Request;
use PDF;
class ChangeControlRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_changeControlRequests=ChangeControlRequest::with('affectedDocument')->get();
        return view('changeControlRequests.index',compact('all_changeControlRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('changeControlRequests.create');
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
      $data['building']=$request->boolean('building');
      $data['supplier']=$request->boolean('supplier');
      $data['document']=$request->boolean('document');
      $data['packing']=$request->boolean('packing');
      $data['machine_equipment']=$request->boolean('machine_equipment');
      $data['manufacturing']=$request->boolean('manufacturing');
      $data['customize']=$request->boolean('customize');
      $data['other']=$request->boolean('other');
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $changeControlRequests = ChangeControlRequest::create($filterData);
        if ($request->affectedDocument) {
          $changeControlRequests->affectedDocument()->createMany($request->affectedDocument);
      }
        

      return redirect('changeControlRequests');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChangeControlRequest  $changeControlRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ChangeControlRequest $changeControlRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChangeControlRequest  $changeControlRequest
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $changeControlRequest=ChangeControlRequest::with('affectedDocument')->find($id);
        return view('changeControlRequests.edit',compact('changeControlRequest'));
    }

    public function print($id)
    {
       $changeControlRequest=ChangeControlRequest::with('affectedDocument')->find($id);
       return view('changeControlRequests.print',compact('changeControlRequest'));

    //    $pdf = PDF::loadView('changeControlRequests.print', compact('changeControlRequest'));
    //    return $pdf->download('changeControlRequests.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChangeControlRequest  $changeControlRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=ChangeControlRequest::find($id);
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $data1['building']=$request->boolean('building');
      $data1['supplier']=$request->boolean('supplier');
      $data1['document']=$request->boolean('document');
      $data1['packing']=$request->boolean('packing');
      $data1['machine_equipment']=$request->boolean('machine_equipment');
      $data1['manufacturing']=$request->boolean('manufacturing');
      $data1['customize']=$request->boolean('customize');
      $data1['other']=$request->boolean('other');
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $data1->update($filterData);
        if ($request->affectedDocument) {
       
          AffectedDocumentDefinition::where('change_control_request_id',$id)->delete();
          $data1->affectedDocument()->createMany($request->affectedDocument);
      }
        
      return redirect('changeControlRequests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChangeControlRequest  $changeControlRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $changeControlRequests=ChangeControlRequest::find($id);
        $changeControlRequests->affectedDocument()->forceDelete();
        $changeControlRequests->forceDelete();
        return redirect()->route('changeControlRequests.index');
    }
}
