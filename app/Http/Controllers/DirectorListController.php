<?php

namespace App\Http\Controllers;

use App\Models\DirectorList;
use App\Models\DirectorListDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class DirectorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_directorList=DirectorList::with('directorList')->get();
      return view('directorList.index',compact('all_directorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('directorList.create');
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
        $directorList = DirectorList::create($filterData);
        if ($request->directorList) {
          $directorList->directorList()->createMany($request->directorList);
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
        $directorList = DirectorList::create($filterData);
        if ($request->directorList) {
          $directorList->directorList()->createMany($request->directorList);
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
        $directorList = DirectorList::create($filterData);
        if ($request->directorList) {
          $directorList->directorList()->createMany($request->directorList);
      }
    }

      return redirect('directorList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirectorList  $directorList
     * @return \Illuminate\Http\Response
     */
    public function show(DirectorList $directorList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirectorList  $directorList
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $directorList=DirectorList::with('directorList')->find($id);
      return view('directorList.edit',compact('directorList'));
    }

    public function print($id)
    {
      $directorList=DirectorList::with('directorList')->find($id);
       $pdf = PDF::loadView('directorList.print', compact('directorList'));
       return $pdf->download('directorList.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DirectorList  $directorList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $directorList=DirectorList::find($id);
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
      $directorList->status='pending';
        $directorList->update($filterData);
        if ($request->directorList) {
       
          DirectorListDefinition::where('director_list_id',$id)->delete();
          $directorList->directorList()->createMany($request->directorList);
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
      $directorList->status='inProgress';
        $directorList->update($filterData);
        if ($request->directorList) {
       
          DirectorListDefinition::where('director_list_id',$id)->delete();
          $directorList->directorList()->createMany($request->directorList);
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
      $directorList->status='confirmed';
        $directorList->update($filterData);
        if ($request->directorList) {
       
          DirectorListDefinition::where('director_list_id',$id)->delete();
          $directorList->directorList()->createMany($request->directorList);
      }
    }
       
      return redirect('directorList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirectorList  $directorList
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $directorList=DirectorList::find($id);
      $directorList->directorList()->forceDelete();
      $directorList->forceDelete();
      return redirect()->route('directorList.index');
    }
}
