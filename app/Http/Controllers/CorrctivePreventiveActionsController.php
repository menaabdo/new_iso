<?php

namespace App\Http\Controllers;

use App\Models\CorrctivePreventiveActions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class CorrctivePreventiveActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_corrctivePreventiveActions=CorrctivePreventiveActions::get();
        return view('corrctivePreventiveActions.index',compact('all_corrctivePreventiveActions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corrctivePreventiveActions.create');
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
      $data['non_matching']=$request->boolean('non_matching');
      $data['customer_complaint']=$request->boolean('customer_complaint');
      $data['internal_review']=$request->boolean('internal_review');
      $data['external_review']=$request->boolean('external_review');
      $data['management_review']=$request->boolean('management_review');
      $data['other']=$request->boolean('other');
      $data['done_1']=$request->boolean('done_1');
      $data['done_2']=$request->boolean('done_2');
      $data['not_done']=$request->boolean('not_done');
      $data['need_done']=$request->boolean('need_done');
      $data['status']="pending";
      $corrctivePreventiveActions = CorrctivePreventiveActions::create($data);
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
        $data['non_matching']=$request->boolean('non_matching');
        $data['customer_complaint']=$request->boolean('customer_complaint');
        $data['internal_review']=$request->boolean('internal_review');
        $data['external_review']=$request->boolean('external_review');
        $data['management_review']=$request->boolean('management_review');
        $data['other']=$request->boolean('other');
        $data['done_1']=$request->boolean('done_1');
        $data['done_2']=$request->boolean('done_2');
        $data['not_done']=$request->boolean('not_done');
        $data['need_done']=$request->boolean('need_done');
        $data['status']="inProgress";
        $corrctivePreventiveActions = CorrctivePreventiveActions::create($data);
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
        $data['non_matching']=$request->boolean('non_matching');
        $data['customer_complaint']=$request->boolean('customer_complaint');
        $data['internal_review']=$request->boolean('internal_review');
        $data['external_review']=$request->boolean('external_review');
        $data['management_review']=$request->boolean('management_review');
        $data['other']=$request->boolean('other');
        $data['done_1']=$request->boolean('done_1');
        $data['done_2']=$request->boolean('done_2');
        $data['not_done']=$request->boolean('not_done');
        $data['need_done']=$request->boolean('need_done');
        $data['status']="confirmed";
        $corrctivePreventiveActions = CorrctivePreventiveActions::create($data);
    }
      return redirect('corrctivePreventiveActions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CorrctivePreventiveActions  $corrctivePreventiveActions
     * @return \Illuminate\Http\Response
     */
    public function show(CorrctivePreventiveActions $corrctivePreventiveActions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CorrctivePreventiveActions  $corrctivePreventiveActions
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $corrctivePreventiveActions=CorrctivePreventiveActions::find($id);
        return view('corrctivePreventiveActions.edit',compact('corrctivePreventiveActions'));
    }

    public function print($id)
    {
       $corrctivePreventiveActions=CorrctivePreventiveActions::find($id);
       return view('corrctivePreventiveActions.print',compact('corrctivePreventiveActions'));

    //    $pdf = PDF::loadView('corrctivePreventiveActions.print', compact('corrctivePreventiveActions'));
    //    return $pdf->download('corrctivePreventiveActions.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CorrctivePreventiveActions  $corrctivePreventiveActions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $corrctivePreventiveActions=CorrctivePreventiveActions::find($id);
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
        $data['non_matching']=$request->boolean('non_matching');
        $data['customer_complaint']=$request->boolean('customer_complaint');
        $data['internal_review']=$request->boolean('internal_review');
        $data['external_review']=$request->boolean('external_review');
        $data['management_review']=$request->boolean('management_review');
        $data['other']=$request->boolean('other');
        $data['done_1']=$request->boolean('done_1');
        $data['done_2']=$request->boolean('done_2');
        $data['not_done']=$request->boolean('not_done');
        $data['need_done']=$request->boolean('need_done');
        $corrctivePreventiveActions->status='pending';
        $corrctivePreventiveActions->update($data);
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
        $data['non_matching']=$request->boolean('non_matching');
        $data['customer_complaint']=$request->boolean('customer_complaint');
        $data['internal_review']=$request->boolean('internal_review');
        $data['external_review']=$request->boolean('external_review');
        $data['management_review']=$request->boolean('management_review');
        $data['other']=$request->boolean('other');
        $data['done_1']=$request->boolean('done_1');
        $data['done_2']=$request->boolean('done_2');
        $data['not_done']=$request->boolean('not_done');
        $data['need_done']=$request->boolean('need_done');
        $corrctivePreventiveActions->status='inProgress';
        $corrctivePreventiveActions->update($data);
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
        $data['non_matching']=$request->boolean('non_matching');
        $data['customer_complaint']=$request->boolean('customer_complaint');
        $data['internal_review']=$request->boolean('internal_review');
        $data['external_review']=$request->boolean('external_review');
        $data['management_review']=$request->boolean('management_review');
        $data['other']=$request->boolean('other');
        $data['done_1']=$request->boolean('done_1');
        $data['done_2']=$request->boolean('done_2');
        $data['not_done']=$request->boolean('not_done');
        $data['need_done']=$request->boolean('need_done');
        $corrctivePreventiveActions->status='confirmed';
        $corrctivePreventiveActions->update($data);
    }
        return redirect('corrctivePreventiveActions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CorrctivePreventiveActions  $corrctivePreventiveActions
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $corrctivePreventiveActions=CorrctivePreventiveActions::find($id);
      $corrctivePreventiveActions->forceDelete();
      return redirect()->route('corrctivePreventiveActions.index');
    }
}
