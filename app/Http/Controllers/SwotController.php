<?php

namespace App\Http\Controllers;

use App\Models\Swot;
use Illuminate\Http\Request;
use PDF;
class SwotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_swots=Swot::get();
        return view('swot.index',compact('all_swots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('swot.create');
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
       Swot::create($data);
      return redirect('swot');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Swot  $swot
     * @return \Illuminate\Http\Response
     */
    public function show(Swot $swot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Swot  $swot
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $swot=Swot::find($id);
        return view('swot.edit',compact('swot'));
    }

    public function print($id)
    {
       $swot=Swot::find($id);
       $pdf = PDF::loadView('swot.print', compact('swot'));
       return $pdf->download('swot.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Swot  $swot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $swot=Swot::find($id);
        $data = $request->all();
        if($request->hasfile('logo')) 
        {
             $image = $request->file('logo');
              $image_name = $image->getClientOriginalName();
              $image->move(public_path('/image'),$image_name);
              $image_path = "/image/" . $image_name;
              $data['logo']=$image_path;
        }
       
        $swot->update($data);
  
        return redirect('swot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Swot  $swot
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $swot=Swot::find($id);
        $swot->forceDelete();
        return redirect()->route('swot.index');
    }
}
