<?php

namespace App\Http\Controllers;

use App\Models\NoticeInternal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class NoticeInternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_noticeInternal=NoticeInternal::get();
      return view('noticeInternal.index',compact('all_noticeInternal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('noticeInternal.create');
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
        NoticeInternal::create($data);
      }elseif(Auth::user()->hasRole('Admin')){
       $data=$request->all();
       $data['status']="inProgress";
        NoticeInternal::create($data);
      }else{
       $data=$request->all();
       $data['status']="confirmed";
        NoticeInternal::create($data);
      }

        return redirect('noticeInternal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeInternal  $noticeInternal
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeInternal $noticeInternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeInternal  $noticeInternal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $notice=NoticeInternal::find($id);
      return view('noticeInternal.edit',compact('notice'));
    }



    public function print($id)
    {
        $notice=NoticeInternal::find($id);
       $pdf = PDF::loadView('noticeInternal.print', compact('notice'));
       return $pdf->download('noticeInternal.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeInternal  $noticeInternal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $notice=NoticeInternal::find($id);
      if(Auth::user()->hasRole('Employee')){
      $data = $request->all();
      $notice->status='pending';
      $notice->update($data);
      }elseif(Auth::user()->hasRole('Admin')){
        $data = $request->all();
        $notice->status='inProgress';
        $notice->update($data);
      }else{
        $data = $request->all();
        $notice->status='confirmed';
        $notice->update($data);
      }
      return redirect('noticeInternal');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeInternal  $noticeInternal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $notice=NoticeInternal::find($id);
      $notice->forceDelete();
      return redirect()->route('noticeInternal.index');
    }
}
