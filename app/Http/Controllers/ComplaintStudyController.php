<?php

namespace App\Http\Controllers;

use App\Models\CausesDefinition;
use App\Models\ComplaintDefinition;
use App\Models\ComplaintStudy;
use App\Models\PromptDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ComplaintStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_complaintStudies=ComplaintStudy::with('prompt','causes','complaint')->get();
      return view('complaintStudy.index',compact('all_complaintStudies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaintStudy.create');
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
        $data = $request->all();
     
      if($request->hasfile('logo')) 
{

  $image = $request->file('logo');
    $image_name = $image->getClientOriginalName();
    $image->move(public_path('/image'),$image_name);
    $image_path = "/image/" . $image_name;
    $data['logo']=$image_path;
}
$data['status']="pending";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $complaintStudy = ComplaintStudy::create($filterData);
        if ($request->prompt) {
          $complaintStudy->prompt()->createMany($request->prompt);
      }
      if ($request->causes) {
        $complaintStudy->causes()->createMany($request->causes);
    }
      if ($request->complaint) {
        $complaintStudy->complaint()->createMany($request->complaint);
    }
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
$data['status']="inProgress";
    $filterData = collect($data)
    ->filter(function ($item) {
        if (!is_array($item)) {
            return $item;
        }
    })
    ->toArray();
      $complaintStudy = ComplaintStudy::create($filterData);
      if ($request->prompt) {
        $complaintStudy->prompt()->createMany($request->prompt);
    }
    if ($request->causes) {
      $complaintStudy->causes()->createMany($request->causes);
  }
    if ($request->complaint) {
      $complaintStudy->complaint()->createMany($request->complaint);
  }
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
$data['status']="confirmed";
    $filterData = collect($data)
    ->filter(function ($item) {
        if (!is_array($item)) {
            return $item;
        }
    })
    ->toArray();
      $complaintStudy = ComplaintStudy::create($filterData);
      if ($request->prompt) {
        $complaintStudy->prompt()->createMany($request->prompt);
    }
    if ($request->causes) {
      $complaintStudy->causes()->createMany($request->causes);
  }
    if ($request->complaint) {
      $complaintStudy->complaint()->createMany($request->complaint);
  }
  }
    return redirect('complaintStudies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComplaintStudy  $complaintStudy
     * @return \Illuminate\Http\Response
     */
    public function show(ComplaintStudy $complaintStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComplaintStudy  $complaintStudy
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $complaintStudy=ComplaintStudy::with('prompt','causes','complaint')->find($id);
        return view('complaintStudy.edit',compact('complaintStudy'));
    }


    public function print($id)
    {
      $complaintStudy=ComplaintStudy::with('prompt','causes','complaint')->find($id);
       $pdf = PDF::loadView('complaintStudy.print', compact('complaintStudy'));
       return $pdf->download('complaintStudy.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComplaintStudy  $complaintStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
            $complaintStudy=ComplaintStudy::find($id);
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
      $complaintStudy->status='pending';
        $complaintStudy->update($filterData);
        if ($request->prompt) {
            PromptDefinition::where('complaint_study_id',$id)->delete();
            $complaintStudy->prompt()->createMany($request->prompt);
        }
        if ($request->causes) {
            CausesDefinition::where('complaint_study_id',$id)->delete();
          $complaintStudy->causes()->createMany($request->causes);
      }
        if ($request->complaint) {
            ComplaintDefinition::where('complaint_study_id',$id)->delete();
          $complaintStudy->complaint()->createMany($request->complaint);
      }
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
$filterData = collect($data)
->filter(function ($item) {
    if (!is_array($item)) {
        return $item;
    }
})
->toArray();
$complaintStudy->status='inProgress';
  $complaintStudy->update($filterData);
  if ($request->prompt) {
      PromptDefinition::where('complaint_study_id',$id)->delete();
      $complaintStudy->prompt()->createMany($request->prompt);
  }
  if ($request->causes) {
      CausesDefinition::where('complaint_study_id',$id)->delete();
    $complaintStudy->causes()->createMany($request->causes);
}
  if ($request->complaint) {
      ComplaintDefinition::where('complaint_study_id',$id)->delete();
    $complaintStudy->complaint()->createMany($request->complaint);
}
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
$filterData = collect($data)
->filter(function ($item) {
    if (!is_array($item)) {
        return $item;
    }
})
->toArray();
$complaintStudy->status='confirmed';
  $complaintStudy->update($filterData);
  if ($request->prompt) {
      PromptDefinition::where('complaint_study_id',$id)->delete();
      $complaintStudy->prompt()->createMany($request->prompt);
  }
  if ($request->causes) {
      CausesDefinition::where('complaint_study_id',$id)->delete();
    $complaintStudy->causes()->createMany($request->causes);
}
  if ($request->complaint) {
      ComplaintDefinition::where('complaint_study_id',$id)->delete();
    $complaintStudy->complaint()->createMany($request->complaint);
}
    }
        
    return redirect('complaintStudies');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComplaintStudy  $complaintStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $complaintStudy=ComplaintStudy::find($id);
      $complaintStudy->forceDelete();
      return redirect()->route('complaintStudies.index');
    }
}
