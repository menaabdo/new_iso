<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDefinition;
use Illuminate\Http\Request;
use PDF;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_customers=Customer::with('customer')->get();
        return view('customers.index',compact('all_customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
      $data['direct']=$request->boolean('direct');
      $data['delegate']=$request->boolean('delegate');
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $customers = Customer::create($filterData);
        if ($request->customer) {
          $customers->customer()->createMany($request->customer);
      }
        

      return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customer=Customer::with('customer')->find($id);
        return view('customers.edit',compact('customer'));
    }

      public function print($id)
    {
        $customer=Customer::with('customer')->find($id);
        return view('customers.print',compact('customer'));

    //    $pdf = PDF::loadView('customers.print', compact('customer'));
    //    return $pdf->download('customers.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data1=Customer::find($id);
      $data = $request->all();
      if($request->hasfile('logo')) 
      {
           $image = $request->file('logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'),$image_name);
            $image_path = "/image/" . $image_name;
            $data['logo']=$image_path;
      }
      $data1['direct']=$request->boolean('direct');
      $data1['delegate']=$request->boolean('delegate');
      $filterData = collect($data)
      ->filter(function ($item) {
          if (!is_array($item)) {
              return $item;
          }
      })
      ->toArray();
        $data1->update($filterData);
        if ($request->customer) {
       
          CustomerDefinition::where('customer_id',$id)->delete();
          $data1->customer()->createMany($request->customer);
      }
        
      return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customers=Customer::find($id);
        $customers->customer()->forceDelete();
        $customers->forceDelete();
        return redirect()->route('customers.index');
      }
}
