<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireForm;
use Illuminate\Http\Request;
use PDF;
class QuestionnaireFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_questionnaireForms=QuestionnaireForm::get();
        return view('questionnaireForm.index',compact('all_questionnaireForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionnaireForm.create');
        
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

      $data['excelant_6']=$request->boolean('excelant_6');
      $data['abverage_6']=$request->boolean('abverage_6');
      $data['fair_6']=$request->boolean('fair_6');

      $data['excelant_7']=$request->boolean('excelant_7');
      $data['abverage_7']=$request->boolean('abverage_7');
      $data['fair_7']=$request->boolean('fair_7');

      $data['excelant_8']=$request->boolean('excelant_8');
      $data['abverage_8']=$request->boolean('abverage_8');
      $data['fair_8']=$request->boolean('fair_8');

      $data['excelant_9']=$request->boolean('excelant_9');
      $data['abverage_9']=$request->boolean('abverage_9');
      $data['fair_9']=$request->boolean('fair_9');

      $data['excelant_10']=$request->boolean('excelant_10');
      $data['abverage_10']=$request->boolean('abverage_10');
      $data['fair_10']=$request->boolean('fair_10');

      QuestionnaireForm::create($data);
      return redirect('questionnaireForms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionnaireForm  $questionnaireForm
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionnaireForm $questionnaireForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionnaireForm  $questionnaireForm
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $questionnaireForm=QuestionnaireForm::find($id);
        return view('questionnaireForm.edit',compact('questionnaireForm'));
    }


    public function print($id)
    {
       $questionnaireForm=QuestionnaireForm::find($id);
       $pdf = PDF::loadView('questionnaireForm.print', compact('questionnaireForm'));
       return $pdf->download('questionnaireForm.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionnaireForm  $questionnaireForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=QuestionnaireForm::find($id);
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
  
        $data1['excelant_6']=$request->boolean('excelant_6');
        $data1['abverage_6']=$request->boolean('abverage_6');
        $data1['fair_6']=$request->boolean('fair_6');
  
        $data1['excelant_7']=$request->boolean('excelant_7');
        $data1['abverage_7']=$request->boolean('abverage_7');
        $data1['fair_7']=$request->boolean('fair_7');
  
        $data1['excelant_8']=$request->boolean('excelant_8');
        $data1['abverage_8']=$request->boolean('abverage_8');
        $data1['fair_8']=$request->boolean('fair_8');
  
        $data1['excelant_9']=$request->boolean('excelant_9');
        $data1['abverage_9']=$request->boolean('abverage_9');
        $data1['fair_9']=$request->boolean('fair_9');
  
        $data1['excelant_10']=$request->boolean('excelant_10');
        $data1['abverage_10']=$request->boolean('abverage_10');
        $data1['fair_10']=$request->boolean('fair_10');
          $data1->update($data);
          
          
        return redirect('questionnaireForms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionnaireForm  $questionnaireForm
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $questionnaireForm=QuestionnaireForm::find($id);
        $questionnaireForm->forceDelete();
        return redirect()->route('questionnaireForms.index');
    }

    
}
