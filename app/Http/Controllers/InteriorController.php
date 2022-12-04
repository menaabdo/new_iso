<?php

namespace App\Http\Controllers;

use App\Models\Interior;
use App\Models\InteriorDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class InteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_interior=Interior::with('interior')->get();
      return view('interior.index',compact('all_interior'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('interior.create');
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
      $data['status']="pending";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interior = Interior::create($filterData);
        if ($request->interior) {
          $interior->interior()->createMany($request->interior);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      $data['status']="inProgress";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interior = Interior::create($filterData);
        if ($request->interior) {
          $interior->interior()->createMany($request->interior);
      }
    }else{
      $data=$request->all();
      $data['status']="confirmed";
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $interior = Interior::create($filterData);
        if ($request->interior) {
          $interior->interior()->createMany($request->interior);
      }
    }
      return redirect('interior');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function show(Interior $interior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $interior=Interior::with('interior')->find($id);
      return view('interior.edite',compact('interior'));
    }

      public function print($id)
    {
       $interior=Interior::with('interior')->find($id);
       return view('interior.print',compact('interior'));

      //  $pdf = PDF::loadView('interior.print', compact('interior'));
      //  return $pdf->download('interior.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $interior=Interior::find($id);
      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
        if (!is_array($item)) {
          return $item;
        }
      })
      ->toArray();
      $interior->status='pending';
      $interior->update($filterData);
        if ($request->interior) {
       
          InteriorDefinition::where('interior_id',$id)->delete();
          $interior->interior()->createMany($request->interior);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
        if (!is_array($item)) {
          return $item;
        }
      })
      ->toArray();
      $interior->status='inProgress';
        $interior->update($filterData);
        if ($request->interior) {
       
          InteriorDefinition::where('interior_id',$id)->delete();
          $interior->interior()->createMany($request->interior);
      }
    }else{
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
        if (!is_array($item)) {
          return $item;
        }
      })
      ->toArray();
      $interior->status='confirmed';
        $interior->update($filterData);
        if ($request->interior) {
       
          InteriorDefinition::where('interior_id',$id)->delete();
          $interior->interior()->createMany($request->interior);
      }
    }
      return redirect('interior');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $interior=Interior::find($id);
      $interior->forceDelete();
      return redirect()->route('interior.index');
    }
}
