<?php

namespace App\Http\Controllers;

use App\Models\TypicalForm;
use App\Models\TypicalFormDefinition;
use Illuminate\Http\Request;
use PDF;
class TypicalFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_typicalForm=TypicalForm::with('typicalForm')->get();
      return view('typicalForm.index',compact('all_typicalForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('typicalForm.create');
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
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $typicalForm = TypicalForm::create($filterData);
        if ($request->typicalForm) {
          $typicalForm->typicalForm()->createMany($request->typicalForm);
      }
       

      return redirect('typicalForm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypicalForm  $typicalForm
     * @return \Illuminate\Http\Response
     */
    public function show(TypicalForm $typicalForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypicalForm  $typicalForm
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $typicalForm=TypicalForm::with('typicalForm')->find($id);
      return view('typicalForm.edit',compact('typicalForm'));
    }

    public function print($id)
    {
      $typicalForm=TypicalForm::with('typicalForm')->find($id);
      return view('typicalForm.print',compact('typicalForm'));

      //  $pdf = PDF::loadView('typicalForm.print', compact('typicalForm'));
      //  return $pdf->download('typicalForm.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypicalForm  $typicalForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $typicalForm=TypicalForm::find($id);
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
        $typicalForm->update($filterData);
        if ($request->typicalForm) {
       
          TypicalFormDefinition::where('typical_form_id',$id)->delete();
          $typicalForm->typicalForm()->createMany($request->typicalForm);
      }
        
      return redirect('typicalForm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypicalForm  $typicalForm
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $typicalForm=TypicalForm::find($id);
      $typicalForm->typicalForm()->forceDelete();
      $typicalForm->forceDelete();
      return redirect()->route('typicalForm.index');
    }
}
