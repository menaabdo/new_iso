<?php

namespace App\Http\Controllers;

use App\Models\recordModel;
use App\Models\recordModelDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class RecordModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_recordModel=recordModel::with('recordModel')->get();
      return view('recordModel.index',compact('all_recordModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view(' recordModel.create');
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
        $recordModel = recordModel::create($filterData);
        if ($request->recordModel) {
          $recordModel->recordModel()->createMany($request->recordModel);
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
        $recordModel = recordModel::create($filterData);
        if ($request->recordModel) {
          $recordModel->recordModel()->createMany($request->recordModel);
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
        $recordModel = recordModel::create($filterData);
        if ($request->recordModel) {
          $recordModel->recordModel()->createMany($request->recordModel);
      }
    }

      return redirect('recordModel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $recordModel=recordModel::with('recordModel')->find($id);
      return view('recordModel.edit',compact('recordModel'));
    }

    public function print($id)
    {
      $recordModel=recordModel::with('recordModel')->find($id);
       $pdf = PDF::loadView('recordModel.print', compact('recordModel'));
       return $pdf->download('recordModel.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recordAction  $recordAction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $recordModel=recordModel::find($id);
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
      $recordModel->status='pending';
        $recordModel->update($filterData);
        if ($request->recordModel) {
       
          recordModelDefinition::where('record_model_id',$id)->delete();
          $recordModel->recordModel()->createMany($request->recordModel);
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
      $recordModel->status='inProgress';
        $recordModel->update($filterData);
        if ($request->recordModel) {
       
          recordModelDefinition::where('record_model_id',$id)->delete();
          $recordModel->recordModel()->createMany($request->recordModel);
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
      $recordModel->status='confirmed';
        $recordModel->update($filterData);
        if ($request->recordModel) {
       
          recordModelDefinition::where('record_model_id',$id)->delete();
          $recordModel->recordModel()->createMany($request->recordModel);
      }
    }
      return redirect('recordModel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recordModel  $recordModel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $recordModel=recordModel::find($id);
      $recordModel->recordModel()->forceDelete();
      $recordModel->forceDelete();
      return redirect()->route('recordModel.index');
    }
}
