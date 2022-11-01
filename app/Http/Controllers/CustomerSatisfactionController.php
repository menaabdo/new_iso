<?php

namespace App\Http\Controllers;

use App\Models\CustomerSatisfaction;
use Illuminate\Http\Request;
use PDF;
class CustomerSatisfactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_customerSatisfactions=CustomerSatisfaction::get();
        return view('customerSatisfaction.index',compact('all_customerSatisfactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerSatisfaction.create');
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
      $data['excelant_1']=$request->boolean('excelant_1');
      $data['abverage_1']=$request->boolean('abverage_1');
      $data['fair_1']=$request->boolean('fair_1');
      
      $data['excelant_1']=$request->boolean('excelant_2');
      $data['abverage_2']=$request->boolean('abverage_2');
      $data['fair_2']=$request->boolean('fair_2');

      $data['excelant_3']=$request->boolean('excelant_3');
      $data['abverage_3']=$request->boolean('abverage_3');
      $data['fair_3']=$request->boolean('fair_3');

      $data['excelant_4']=$request->boolean('excelant_4');
      $data['abverage_4']=$request->boolean('abverage_4');
      $data['fair_4']=$request->boolean('fair_4');

      $data['excelant_5']=$request->boolean('excelant_5');
      $data['abverage_5']=$request->boolean('abverage_5');
      $data['fair_5']=$request->boolean('fair_5');

      CustomerSatisfaction::create($data);
      return redirect('customerSatisfactions');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerSatisfaction  $customerSatisfaction
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerSatisfaction $customerSatisfaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerSatisfaction  $customerSatisfaction
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customerSatisfaction=CustomerSatisfaction::find($id);
        return view('customerSatisfaction.edit',compact('customerSatisfaction'));
    }

       public function print($id)
    {
        $customerSatisfaction=CustomerSatisfaction::find($id);
       $pdf = PDF::loadView('customerSatisfaction.print', compact('customerSatisfaction'));
       return $pdf->download('customerSatisfaction.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerSatisfaction  $customerSatisfaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=CustomerSatisfaction::find($id);
        $data = $request->all();
        if($request->hasfile('logo')) 
        {
             $image = $request->file('logo');
              $image_name = $image->getClientOriginalName();
              $image->move(public_path('/image'),$image_name);
              $image_path = "/image/" . $image_name;
              $data['logo']=$image_path;
        }
        $data1['excelant_1']=$request->boolean('excelant_1');
        $data1['abverage_1']=$request->boolean('abverage_1');
        $data1['fair_1']=$request->boolean('fair_1');
        
        $data1['excelant_2']=$request->boolean('excelant_2');
        $data1['abverage_2']=$request->boolean('abverage_2');
        $data1['fair_2']=$request->boolean('fair_2');
  
        $data1['excelant_3']=$request->boolean('excelant_3');
        $data1['abverage_3']=$request->boolean('abverage_3');
        $data1['fair_3']=$request->boolean('fair_3');
  
        $data1['excelant_4']=$request->boolean('excelant_4');
        $data1['abverage_4']=$request->boolean('abverage_4');
        $data1['fair_4']=$request->boolean('fair_4');
  
        $data1['excelant_5']=$request->boolean('excelant_5');
        $data1['abverage_5']=$request->boolean('abverage_5');
        $data1['fair_5']=$request->boolean('fair_5');
        $data1->update($data);
          
          
        return redirect('customerSatisfactions');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerSatisfaction  $customerSatisfaction
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customerSatisfaction=CustomerSatisfaction::find($id);
        $customerSatisfaction->forceDelete();
        return redirect()->route('customerSatisfactions.index');
    }
}
