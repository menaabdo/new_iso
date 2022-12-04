<?php

namespace App\Http\Controllers;

use App\Models\recordCanceledDocument;
use App\Models\recordCanceledDocumentDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class RecordCanceledDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_recordCanceledDocument=recordCanceledDocument::with('recordCanceledDocument')->get();
      return view('recordCanceledDocument.index',compact('all_recordCanceledDocument'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view(' recordCanceledDocument.create');
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
        $recordCanceledDocument = recordCanceledDocument::create($filterData);
        if ($request->recordCanceledDocument) {
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
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
        $recordCanceledDocument = recordCanceledDocument::create($filterData);
        if ($request->recordCanceledDocument) {
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
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
        $recordCanceledDocument = recordCanceledDocument::create($filterData);
        if ($request->recordCanceledDocument) {
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
      }
    }
       

      return redirect('recordCanceledDocument');
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
      $recordCanceledDocument=recordCanceledDocument::with('recordCanceledDocument')->find($id);
      return view('recordCanceledDocument.edit',compact('recordCanceledDocument'));
    }

    public function print($id)
    {
      $recordCanceledDocument=recordCanceledDocument::with('recordCanceledDocument')->find($id);
      return view('recordCanceledDocument.print',compact('recordCanceledDocument'));

      //  $pdf = PDF::loadView('recordCanceledDocument.print', compact('recordCanceledDocument'));
      //  return $pdf->download('recordCanceledDocument.pdf');  
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
      $recordCanceledDocument=recordCanceledDocument::find($id);
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
      $recordCanceledDocument->status='pending';
        $recordCanceledDocument->update($filterData);
        if ($request->recordCanceledDocument) {
       
          recordCanceledDocumentDefinition::where('document_id',$id)->delete();
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
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
      $recordCanceledDocument->status='inProgress';
        $recordCanceledDocument->update($filterData);
        if ($request->recordCanceledDocument) {
       
          recordCanceledDocumentDefinition::where('document_id',$id)->delete();
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
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
      $recordCanceledDocument->status='confirmed';
        $recordCanceledDocument->update($filterData);
        if ($request->recordCanceledDocument) {
       
          recordCanceledDocumentDefinition::where('document_id',$id)->delete();
          $recordCanceledDocument->recordCanceledDocument()->createMany($request->recordCanceledDocument);
      }
    }
      return redirect('recordCanceledDocument');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recordCanceledDocument  $recordCanceledDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $recordCanceledDocument=recordCanceledDocument::find($id);
      $recordCanceledDocument->recordCanceledDocument()->forceDelete();
      $recordCanceledDocument->forceDelete();
      return redirect()->route('recordCanceledDocument.index');
    }
}
