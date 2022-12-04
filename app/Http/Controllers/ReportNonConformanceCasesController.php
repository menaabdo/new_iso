<?php

namespace App\Http\Controllers;

use App\Models\ReportNonConformanceCases;
use App\Models\ReportNonConformanceCasesDefinition;
use Illuminate\Http\Request;
use PDF;
class ReportNonConformanceCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_reportNonConformanceCases=ReportNonConformanceCases::with('reportNonConformanceCases')->get();
        return view('reportNonConformanceCases.index',compact('all_reportNonConformanceCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportNonConformanceCases.create');
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
          $reportNonConformanceCases = ReportNonConformanceCases::create($filterData);
          if ($request->reportNonConformanceCases) {
            $reportNonConformanceCases->reportNonConformanceCases()->createMany($request->reportNonConformanceCases);
        }
          
  
        return redirect('reportNonConformanceCases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportNonConformanceCases  $reportNonConformanceCases
     * @return \Illuminate\Http\Response
     */
    public function show(ReportNonConformanceCases $reportNonConformanceCases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportNonConformanceCases  $reportNonConformanceCases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $reportNonConformanceCases=ReportNonConformanceCases::with('reportNonConformanceCases')->find($id);
        return view('reportNonConformanceCases.edit',compact('reportNonConformanceCases'));
    }

    public function print($id)
    {
     $reportNonConformanceCases=ReportNonConformanceCases::with('reportNonConformanceCases')->find($id);
     return view('reportNonConformanceCases.print',compact('reportNonConformanceCases'));

    //    $pdf = PDF::loadView('reportNonConformanceCases.print', compact('reportNonConformanceCases'));
    //    return $pdf->download('reportNonConformanceCases.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportNonConformanceCases  $reportNonConformanceCases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $reportNonConformanceCases=ReportNonConformanceCases::find($id);
      $data = $request->all();
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $reportNonConformanceCases->update($filterData);
        if ($request->reportNonConformanceCases) {
       
          ReportNonConformanceCasesDefinition::where('report_cases_id',$id)->delete();
          $reportNonConformanceCases->reportNonConformanceCases()->createMany($request->reportNonConformanceCases);
      }
      return redirect('reportNonConformanceCases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportNonConformanceCases  $reportNonConformanceCases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $reportNonConformanceCases=ReportNonConformanceCases::find($id);
        $reportNonConformanceCases->reportNonConformanceCases()->forceDelete();
        $reportNonConformanceCases->forceDelete();
        return redirect()->route('reportNonConformanceCases.index');
    }
}
