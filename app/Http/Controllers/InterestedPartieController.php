<?php

namespace App\Http\Controllers;

use App\Models\InterestedPartie;
use App\Models\InterestedPartieDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class InterestedPartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_interestedParties=InterestedPartie::with('interestedPartie')->get();
        return view('interestedParties.index',compact('all_interestedParties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interestedParties.create');
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interestedParties = InterestedPartie::create($filterData);
        if ($request->interestedPartie) {
          $interestedParties->interestedPartie()->createMany($request->interestedPartie);
      }
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interestedParties = InterestedPartie::create($filterData);
        if ($request->interestedPartie) {
          $interestedParties->interestedPartie()->createMany($request->interestedPartie);
      }
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interestedParties = InterestedPartie::create($filterData);
        if ($request->interestedPartie) {
          $interestedParties->interestedPartie()->createMany($request->interestedPartie);
      }
    }

      return redirect('interestedParties');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterestedPartie  $interestedPartie
     * @return \Illuminate\Http\Response
     */
    public function show(InterestedPartie $interestedPartie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InterestedPartie  $interestedPartie
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $interestedPartie=InterestedPartie::with('interestedPartie')->find($id);
      return view('interestedParties.edit',compact('interestedPartie'));
    }

    public function print($id)
    {
       $interestedPartie=InterestedPartie::with('interestedPartie')->find($id);
       $pdf = PDF::loadView('interestedParties.print', compact('interestedPartie'));
       return $pdf->download('interestedParties.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InterestedPartie  $interestedPartie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=InterestedPartie::find($id);
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
      $data1->status='pending';
        $data1->update($filterData);
        if ($request->interestedPartie) {
       
          InterestedPartieDefinition::where('interested_partie_id',$id)->delete();
          $data1->interestedPartie()->createMany($request->interestedPartie);
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
      $data1->status='inProgress';
        $data1->update($filterData);
        if ($request->interestedPartie) {
       
          InterestedPartieDefinition::where('interested_partie_id',$id)->delete();
          $data1->interestedPartie()->createMany($request->interestedPartie);
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
      $data1->status='confirmed';
        $data1->update($filterData);
        if ($request->interestedPartie) {
       
          InterestedPartieDefinition::where('interested_partie_id',$id)->delete();
          $data1->interestedPartie()->createMany($request->interestedPartie);
      }
    }
        
      return redirect('interestedParties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterestedPartie  $interestedPartie
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $interestedParties=InterestedPartie::find($id);
      $interestedParties->interestedPartie()->forceDelete();
      $interestedParties->forceDelete();
      return redirect()->route('interestedParties.index');
    }
}
