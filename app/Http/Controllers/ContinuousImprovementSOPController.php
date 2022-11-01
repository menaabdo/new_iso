<?php

namespace App\Http\Controllers;

use App\Models\ISO;
use App\Models\IsoDefinition;
use App\Models\IsoModule;
use Illuminate\Http\Request;
use PDF;
class ContinuousImprovementSOPController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $all_iso=ISO::with('definition','module')->where('type',10)->get();
    return view('ContinuousImprovementSOP.index',compact('all_iso'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('ContinuousImprovementSOP.create');
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
   
    if($request->hasfile('company_logo')) 
{

$image = $request->file('company_logo');
  $image_name = $image->getClientOriginalName();
  $image->move(public_path('/image'),$image_name);
  $image_path = "/image/" . $image_name;
  $data['company_logo']=$image_path;
}

if($request->hasfile('image_illustration')) 
{

$image2 = $request->file('image_illustration');
  $image_name2 = $image2->getClientOriginalName();
  $image2->move(public_path('/image'),$image_name2);
  $image_path2 = "/image/" . $image_name2;
  $data['image_illustration']=$image_path2;
}
    $filterData = collect($data)
    ->filter(function ($item) {
        if (!is_array($item)) {
            return $item;
        }
    })
    ->toArray();
      $iso = ISO::create($filterData);
      if ($request->names) {
        $iso->definition()->createMany($request->names);
    }
    if ($request->models) {
      $iso->module()->createMany($request->models);
  }
     
  return redirect('ContinuousImprovementSOP');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ISO  $iSO
   * @return \Illuminate\Http\Response
   */
  public function show(ISO $iSO)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ISO  $iSO
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
     $iso=ISO::with('definition','module')->find($id);
      return view('ContinuousImprovementSOP.edit',compact('iso'));
  }

    public function print($id)
    {
      $iso=ISO::with('definition','module')->find($id);
       $pdf = PDF::loadView('ContinuousImprovementSOP.print', compact('iso'));
       return $pdf->download('ContinuousImprovementSOP.pdf');  
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ISO  $iSO
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,$id)
  {
    $iso=ISO::find($id);
    $data = $request->all();
    if($request->hasfile('company_logo')) 
{

$image = $request->file('company_logo');
  $image_name = $image->getClientOriginalName();
  $image->move(public_path('/image'),$image_name);
  $image_path = "/image/" . $image_name;
  $data['company_logo']=$image_path;
}

if($request->hasfile('image_illustration')) 
{

$image2 = $request->file('image_illustration');
  $image_name2 = $image2->getClientOriginalName();
  $image2->move(public_path('/image'),$image_name2);
  $image_path2 = "/image/" . $image_name2;
  $data['image_illustration']=$image_path2;
}
    $filterData = collect($data)
    ->filter(function ($item) {
        if (!is_array($item)) {
            return $item;
        }
    })
    ->toArray();
      $iso->update($filterData);
      if ($request->names) {
        IsoDefinition::where('i_s_o_id',$id)->delete();
        $iso->definition()->createMany($request->names);
    }
    if ($request->models) {
      IsoModule::where('i_s_o_id',$id)->delete();
      $iso->module()->createMany($request->models);
  }
  return redirect('ContinuousImprovementSOP');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ISO  $iSO
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $iso=ISO::find($id);
    $iso->forceDelete();
    return redirect()->route('ContinuousImprovementSOP.index');
  }
}