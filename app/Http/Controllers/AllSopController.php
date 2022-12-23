<?php

namespace App\Http\Controllers;

use App\Models\ISO;
use App\Models\IsoDefinition;
use App\Models\IsoModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AllSopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_iso=ISO::with('definition','module')->get();
      return view('AllSOP.index',compact('all_iso'));
    }

    public function show($id)
    {
        $iso=ISO::with('definition','module')->find($id);
        return view('AllSOP.show',compact('iso'));
    }

  
}