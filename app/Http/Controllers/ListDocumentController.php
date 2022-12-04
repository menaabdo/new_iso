<?php

namespace App\Http\Controllers;

use App\Models\ListDocument;
use App\Models\ListDocumentDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ListDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_listDocument=ListDocument::with('listDocument')->get();
      return view('listDocument.index',compact('all_listDocument'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('listDocument.create');
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
        $listDocument = ListDocument::create($filterData);
        if ($request->listDocument) {
          $listDocument->listDocument()->createMany($request->listDocument);
      }
    }elseif(Auth::user()->hasRole('Admin')){
      $data=$request->all();
      $data['status']="inProgress";
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
        $listDocument = ListDocument::create($filterData);
        if ($request->listDocument) {
          $listDocument->listDocument()->createMany($request->listDocument);
      }
    }else{
      $data=$request->all();
      $data['status']="confirmed";
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
        $listDocument = ListDocument::create($filterData);
        if ($request->listDocument) {
          $listDocument->listDocument()->createMany($request->listDocument);
      }
    }

      return redirect('listDocument');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ListDocument $listDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $listDocument=ListDocument::with('listDocument')->find($id);
      return view('listDocument.edit',compact('listDocument'));
    }

    public function print($id)
    {
       $listDocument=ListDocument::with('listDocument')->find($id);
       return view('listDocument.print',compact('listDocument'));

      //  $pdf = PDF::loadView('listDocument.print', compact('listDocument'));
      //  return $pdf->download('listDocument.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $listDocument=ListDocument::find($id);
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
      $listDocument->status='pending';
        $listDocument->update($filterData);
        if ($request->listDocument) {
       
          ListDocumentDefinition::where('list_document_id',$id)->delete();
          $listDocument->listDocument()->createMany($request->listDocument);
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
      $listDocument->status='inProgress';
        $listDocument->update($filterData);
        if ($request->listDocument) {
       
          ListDocumentDefinition::where('list_document_id',$id)->delete();
          $listDocument->listDocument()->createMany($request->listDocument);
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
      $listDocument->status='confirmed';
        $listDocument->update($filterData);
        if ($request->listDocument) {
       
          ListDocumentDefinition::where('list_document_id',$id)->delete();
          $listDocument->listDocument()->createMany($request->listDocument);
      }
    }
      return redirect('listDocument');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $listDocument=ListDocument::find($id);
      $listDocument->listDocument()->forceDelete();
      $listDocument->forceDelete();
      return redirect()->route('listDocument.index');
    }
}
