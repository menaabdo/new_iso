@extends('layouts.master')

@section('content')
<style>
    .back{
    /* background-color: #163e73 !important; */
}
.form__div {
    position: relative;
    height: 48px;
    margin-bottom: 1.5rem;
    width: 60%;
   margin-right:4px 
  }
  
  .form__input {
    position: absolute;
    top: 0;
    left: 0;
    width: 450px;
    height: 48px;
    font-size: 14px;
    border: 1px solid ;
    background-color:#ffffff !important;
    border-radius: 4px;
    outline: none;
    padding: 1rem;
    background: transparent;
    z-index: 1;
  }
  
  input{
      border:none !important
  }
  
  .form__label {
    position: absolute;
    right:  4rem;
    top: 1rem;
    padding: 0 .25rem;
    /* background-color: white; */
    color: #2a415b!important;
    font-size: 14px;
    -webkit-transition: .3s;
    transition: .3s;
  }
  
  /*Input focus move up label*/
  .form__input:focus + .form__label {
    top: -2rem;
    right: .8rem;
    color: white;
    font-size: 14px;
    font-weight: 400;
    z-index: 10;
  }
  .form__input:focus::placeholder{
      /* color:#1a274e */
  }
  .form__input{
      color: black !important;
  }
  
  /*Input focus sticky top label*/
  .form__input:not(:placeholder-shown).form__input:not(:focus) + .form__label {
    top: -2rem;
    right:  .8rem;
    z-index: 10;
    font-size: 14px;
    font-weight: 400;
  }
  
  /*Input focus*/
  .form__input:focus {
    border: 1.5px solid #989BA7;
  }
  
  .customersreview {
    padding-bottom: 100px;
  }
  
  .customersreview-wrapper {
    position: relative;
  }
  
.account-sign {
    padding: 20px 0px;
    /* background-color: #EFEFEF;; */
  }
  
  .account-sign-in {
    /* padding: 45px; */
    /* background-color: white; */
    border-radius: 5px;
    margin-right: 24px;
    
  }
  
  .account-sign-in h5 {
    color: #1A2224;
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 30px;
  }
  
  .account-sign-in form .form__div {
    margin-bottom: 30px;
    
  }
  
  .account-sign-in form .form__div input {
    border: 1px solid #989BA7;
    border-radius: 4px;
    padding: 20px;
    width: 100% !important;
    height: 37px;
  }
  
  .account-sign-in form .password-info {
    margin-top: 12px;
    margin-bottom: 30px;
  }
  
  .account-sign-in form .password-info-left {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }
  
  .account-sign-in form .password-info-left input {
    width: 15px;
    height: 15px;
    border-color: #989BA7;
    border-radius: 2px;
    margin-right: 6px;
  }
  
  .account-sign-in form .password-info-left label {
    cursor: pointer;
    font-size: 14px;
    color: #989BA7;
  }
  
  .account-sign-in form .password-info-right a {
    color: #1A2224;
    font-size: 14px;
  }
  
  .account-sign-in form button {
    width: 100%;
    padding: 15px 0px;
    background-color: #335AFF;
    font-size: 14px;
    font-weight: 500;
    border: none;
    border-radius: 4px;
    text-transform: uppercase;
  }
  
  .account-sign-in form button:focus {
    background-color: #335AFF;
    border: none;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
  
  .account-sign-in .social-signing {
    margin-top: 30px;
  }
  
  .account-sign-in .social-signing p {
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 15px;
  }
  
  .account-sign-in .social-signing-link {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
  }
  
  .account-sign-in .social-signing-link a {
    margin-left: 16px;
    border: 1px solid #EFEFEF;
    color: #989BA7;
    padding: 12px 18px;
    border-radius: 3px;
  }
  
  .account-sign-in .social-signing-link a svg {
    margin-right: 5px;
  }
  
  .account-sign-up {
    padding: 45px;
    /* background-color: white; */
    border-radius: 5px;
    margin-left: 24px;
  }
  
  .account-sign-up h5 {
    color: #1A2224;
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 30px;
  }
  
  .account-sign-up form .form__div {
    margin-bottom: 24px;
  }
  
  .account-sign-up form .form__div input {
    border: 1px solid #989BA7;
    border-radius: 4px;
    padding: 20px;
    width: 100% !important;
  }
  
  .account-sign-up form .password-info-show {
    margin-top: 12px;
    margin-bottom: 32px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }
  
  .account-sign-up form .password-info-show input {
    margin-right: 6px;
    width: 15px;
    height: 15px;
    border-color: #989BA7;
    border-radius: 2px;
  }
  
  .account-sign-up form .password-info-show label {
    cursor: pointer;
    font-size: 14px;
    color: #989BA7;
  }
  
  .account-sign-up form button {
    width: 100%;
    padding: 15px 0px;
    background-color: #335AFF;
    font-size: 14px;
    font-weight: 500;
    border: none;
    border-radius: 4px;
    text-transform: uppercase;
  }
  
  .account-sign-up form button:focus {
    background-color: #335AFF;
    border: none;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
  
  @media (min-width: 992px) and (max-width: 1200px) {
    .account-sign-in .social-signing-link a {
      width: 100%;
      margin-bottom: 20px;
      text-align: center;
      margin-left: 0;
    }
    .account-sign-in {
      margin-right: 0;
    }
    .account-sign-up {
      margin-left: 0;
    }
  }
  
  @media (min-width: 768px) and (max-width: 991px) {
    .account-sign {
      /* padding: 70px; */
    }
    .account-sign-in {
      margin-right: 0;
      margin-bottom: 50px;
    }
    .account-sign-up {
      margin-left: 0;
    }
  }
  
  @media (min-width: 575px) and (max-width: 767px) {
    .account-sign {
      padding: 10px;
      padding-bottom: 50px;
      /* padding-top: 50px; */
    }
    .account-sign-in {
      margin-right: 0;
      margin-bottom: 40px;
    }
    .account-sign-up {
      margin-left: 0;
    }
    .account-sign-in .social-signing-link a {
      width: 100%;
      margin-bottom: 20px;
      text-align: center;
      margin-left: 0;
    }
  }
  
  @media only screen and (min-width: 420px) and (max-width: 574px) {
    .account-sign {
      padding: 10px;
      padding-bottom: 50px;
      padding-top: 50px;
    }
    .account-sign-in {
      margin-right: 0;
      margin-bottom: 40px;
      padding: 30px 15px;
    }
    .account-sign-up {
      margin-left: 0;
    }
    .account-sign-in .social-signing-link a {
      width: 100%;
      margin-bottom: 20px;
      text-align: center;
      margin-left: 0;
    }
  }
  
  @media (max-width: 420px) {
    .account-sign {
      padding: 10px;
      padding-bottom: 30px;
      padding-top: 30px;
    }
    .account-sign-in {
      margin-right: 0;
      margin-bottom: 40px;
      padding: 20px 15px;
    }
    .account-sign-in form .password-info {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      -ms-flex-line-pack: start;
          align-content: flex-start;
    }
    .account-sign-in form .password-info-left {
      margin-bottom: 6px;
    }
    .account-sign-up {
      margin-left: 0;
      padding: 20px 15px;
    }
    .account-sign-in .social-signing-link a {
      width: 100%;
      margin-bottom: 20px;
      text-align: center;
      margin-left: 0;
    }
  }
  .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
input,textarea{
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important; 
}
td{
    text-align:center;
}
    </style>

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="container mt-3 p-3" style='background-color:white'>
   
   <main class="mt-0">
  
   <section class="account-sign ">
       
   <div class="container" >
       <div class="row">
           <div class="col-lg-10 col-md-10" style='margin:auto'>
           <h3 style="margin-top:30px;color:#2a415b;padding:10px;color: #2a415b;
   text-shadow: 1px 1px 1px #3ed3ea;font-weight: bold;">@lang('main.Change control') </h3>
   <hr style='background-color:#3ed3ea'>
  
  
        <form action="{{ route('changeControlSOP.update', $iso->id) }}" method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <input type="hidden" name="type" value="9">
            <div style="overflow-x:auto;">
 
                <table style="width: 850px;" class="table table-bordered my-4   m-auto">
                    <thead>
                        <tr>
                            <th class=" w-50 text-center col-3 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="form__label border-0 text-white" style="text-align: center;">@lang('main.Manage Name')</label>
    
                                    <input  type="text" name="manage_name"
                                        value="{{ $iso->manage_name }}" style="text-align: start;"
                                        >
                                </div>
    
                            </th>
                            <th class="col-3 ">
                                <div style="display: flex;justify-content: center;align-items: center;height: 50px;">
                                    @lang('main.Standard work steps') 
                                </div>
    
                            </th>
    
                            <th class="col-4">
                                <div
                                    style="display: flex;justify-content: center;align-items: center;height: 50px;width: 200px;">
                                    <label for="img"> @lang('main.Company Logo')</label>
                                    <img src="{{ asset($iso->company_logo) }}" width="50px" />
                                    @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
    
                                        <input type="file" id="img" name="company_logo" accept="image/*">
                                    @endif
    
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <input type="file" id="img" name="company_logo" accept="image/*">
                                    @endif
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <input type="file" id="img" name="company_logo" accept="image/*">
                                    @endif
    
                                </div>
    
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">@lang('main.Active Date')</label>
                                    <input class="form-control" type="date" name="active_date"
                                        value="{{ $iso->active_date }}" style="text-align: end;">
                                </div>
                            </th>
    
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">@lang('main.release_date')</label>
                                    <input class="form-control" type="date" name="release_date"
                                        value="{{ $iso->release_date }}" style="text-align: end;">
                                </div>
                            </th>
    
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;"> @lang('main.document_number')</label>
                                    <input class="form-control" type="text" name="document_number"
                                        value="{{ $iso->document_number }}" style="text-align: start;"
                                        placeholder="@lang('main.document_number') ">
                                </div>
                            </th>
    
                        </tr>
                        <tr>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">@lang('main.Page Number')</label>
                                    <input class="form-control" type="number" name="page_number"
                                        value="{{ $iso->page_number }}" style="text-align: start;"
                                        placeholder=" @lang('main.Page Number') ">
                                </div>
                            </th>
    
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">@lang('main.review_date')</label>
                                    <input class="form-control" type="date" name="review_date"
                                        value="{{ $iso->review_date }}" style="text-align: end;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">@lang('main.document_code')</label>
                                    <input class="form-control" type="text" name="document_code"
                                        value="{{ $iso->document_code }}" style="text-align: start;"
                                        placeholder="@lang('main.document_code') ">
                                </div>
                            </th>
    
    
                        </tr>
    
                    </tbody>
                </table>
                </div>
                <hr style="border: 5px; margin: 50px ;">
    
                <section style="width: 550px;margin-top: 200px;ق" class=" my-4  p-4 m-auto">
                    <div class="form-group row row1 ">
                        <label for="" class="col-sm-2 col-form-label">@lang('main.Company Name')</label>
                        <div class="col-sm-10">
                            <input type="text" name="company_name" value="{{ $iso->company_name }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row row1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">@lang('main.procedure_name')</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="procedure_name"
                                value="{{ $iso->procedure_name }}" id="inputPassword">
                        </div>
                    </div>
                </section>
                <hr style="border: 5px; margin: 50px ;">
    
                <section style="width: 550px;margin-top: 200px;" class=" my-4  p-4 m-auto">
                    <div class="form-group row row1">
                        <label for="" class="col-sm-2 col-form-label">@lang('main.version_number')</label>
                        <div class="col-sm-10">
                            <input type="text" name="version_number" value="{{ $iso->version_number }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row row1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">@lang('main.copy_holder')</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="copy_holder" value="{{ $iso->copy_holder }}"
                                id="inputPassword">
                        </div>
                    </div>
                </section>
                <hr style="border: 5px; margin: 50px ;">
                <div style="overflow-x:auto;">
     
                <table style="width: 550px;" class="table table-bordered my-4   m-auto">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;;">
                                             @lang('main.prepare')</label>
    
                                        <input class="form-control" type="text" name="prepare"
                                            value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                    </div>
    
                                </th>
                                @if ($iso->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                    <th class=" w-50 text-center col-2 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                                @lang('main.review')</label>
    
                                            <input class="form-control" type="text" name="review"
                                                value="{{ $iso->review }}" placeholder="" readonly>
                                        </div>
    
                                    </th>
                                @endif
                                @if ($iso->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                    <th class=" w-50 text-center col-2 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                                @lang('main.review')</label>
    
                                            <input class="form-control" type="text" name="review"
                                                value="{{ $iso->review }}" placeholder="" readonly>
                                        </div>
    
                                    </th>
                                    <th class=" w-50 text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: end;font-size:xx-large;font-weight: bolder;">
                                                @lang('main.approval')</label>
    
                                            <input class="form-control" type="text" name="approval"
                                                value="{{ $iso->approval }}" style="text-align: end;width: 120px;" readonly>
                                        </div>
    
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                             @lang('main.prepare')</label>
    
                                        <input class="form-control" type="text" name="prepare"
                                            value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                    </div>
    
                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                            @lang('main.review')</label>
    
                                        <input class="form-control" type="text" name="review"
                                            value="{{ $iso->review }}" placeholder="">
                                    </div>
    
                                </th>
    
                                @if ($iso->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-2 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: end;font-size:xx-large;font-weight: bolder;">
                                                @lang('main.approval')</label>
    
                                            <input class="form-control" type="text" name="approval"
                                                value="{{ $iso->approval }}" style="text-align: end;width: 120px;" readonly>
                                        </div>
    
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;">
                                             @lang('main.prepare')</label>
    
                                        <input class="form-control" type="text" name="prepare"
                                            value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                    </div>
    
                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: star;">
                                            @lang('main.review')</label>
    
                                        <input class="form-control" type="text" name="review"
                                            value="{{ $iso->review }}" placeholder="">
                                    </div>
    
                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: end;">
                                            @lang('main.approval')</label>
    
                                        <input class="form-control" type="text" name="approval"
                                            value="{{ $iso->approval }}" style="text-align: end;width: 120px;">
                                    </div>
    
                                </th>
                            @endif
                        </tr>
                    </thead>
    
                </table>
                </div>
                <hr style="border: 5px; margin: 50px ;">
                <div style="overflow-x:auto;">
     
                <table style="width: 550px;justify-content: center;align-items: center;"
                    class="table table-bordered my-4   m-auto">
                    <thead>
                        <tr>
                            <th class=" w-50 text-center col-4 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align: end;font-size:large;font-weight: bolder;">@lang('main.number_edit')</label>
    
                                </div>
    
                            </th>
                            <th class=" w-100 text-center col-4 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: star;">1</label>
    
    
                                </div>
    
                            </th>
                            <th class=" w-100 text-center col-4 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">2 </label>
    
                                </div>
    
                            </th>
                            <th class=" w-100 text-center col-4 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">3 </label>
    
                                </div>
                            </th>
                            <th class=" w-100 text-center col-4 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align: center;">4 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
    
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')</label>
    
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <input class="form-control" type="date" name="date_1" value="{{ $iso->date_1 }}"
                                        style="text-align: end;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <input class="form-control" type="date" name="date_2" value="{{ $iso->date_2 }}"
                                        style="text-align: end;width: 120px;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <input class="form-control" type="date" name="date_3" value="{{ $iso->date_3 }}"
                                        style="text-align: end;width: 120px;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="" style="text-align:center ;">
                                    <input class="form-control" type="date" name="date_4"
                                        value="{{ $iso->date_4 }}"style="text-align: end;">
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th class=" w-100 text-center ">
                                <div class="form-group mt-4"
                                    style="text-align:center ;justify-content: center;align-items: center; width: 140px;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.page/pages')</label>
    
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="form-group mt-4"
                                    style="text-align:center ;justify-content: center;align-items: center;">
                                    <input class="form-control" type="text" name="page_1" value="{{ $iso->page_1 }}"
                                        style="text-align: end;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="form-group mt-4"
                                    style="text-align:center ;justify-content: center;align-items: center;">
                                    <input class="form-control" type="text" name="page_2" value="{{ $iso->page_2 }}"
                                        style="text-align: end;width: 120px;" placeholder=" ">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="form-group w-100 mt-4"
                                    style="text-align:center ;justify-content: center;align-items: center;">
                                    <input class="form-control" type="text" name="page_3" value="{{ $iso->page_3 }}"
                                        style="text-align: end;">
                                </div>
                            </th>
                            <th class=" w-50 text-center ">
                                <div class="form-group w-100 mt-4"
                                    style="text-align:center ;justify-content: center;align-items: center;">
                                    <input class="form-control" type="text" name="page_4" value="{{ $iso->page_4 }}"
                                        style="text-align: end;">
    
                                </div>
                            </th>
                        </tr>
    
    
                    </tbody>
                </table>
                 </div>
                <hr style="border: 5px; margin: 50px ;">
                <section class="row row2" style="margin-right: 100px;">
                    <h2>@lang('main.Action illustration:')</h2>
                    <div class="input-group my-3  mx-3">
                        <img src="{{ asset($iso->image_illustration) }}" width="50px" />
                        @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <input type="file" id="inputGroupFile01" name="image_illustration" class="form-control">
                        @endif
    
                        @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <input type="file" id="inputGroupFile01" name="image_illustration" class="form-control">
                        @endif
                        @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <input type="file" id="inputGroupFile01" name="image_illustration" class="form-control">
                        @endif
                        
                    </div>
    
    
    
                </section>
            
                <section>
                    <div class="row row3" style=";text-align: start;">
                        <p>@lang('main.procedure')</p>
                        <h3>  @lang('main.Terms and illustrations')</h3>
                        <div style="overflow-x:auto;">
                        <table class="table table-bordered my-4">
                            <thead>
                                <tr>
                                    <th scope="col" style="font-size:large">@lang('main.drawing') </th>
                                    <th scope="col" style="font-size:large">@lang('main.term')</th>
                                    <th scope="col" style="font-size:large">@lang('main.explain')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="width: 150px; height: 80px;border: 2px solid grey;">
                                            <div style="width: 20px; height: 80px;border: 2px solid grey;float: left;">
        
                                            </div>
                                        </div>
                                    </td>
                                    <td>@lang('main.Employment')</td>
                                    <td>@lang('main.figure') </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="width: 120px; height: 40px;border: 2px solid grey;border-radius: 25px;">
        
                                        </div>
                                    </td>
                                    <td>@lang('main.start')</td>
                                    <td>@lang('main.start_figure')</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="width: 150px; height: 90px;border: 2px solid grey;background-color: gray;">
        
                                        </div>
                                    </td>
                                    <td>@lang('main.practical')</td>
                                    <td>@lang('main.practical_figure') </td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>@lang('main.documents')</td>
                                    <td>@lang('main.documents_action') </td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>@lang('main.sub process') </td>
                                    <td>@lang('main.procedure sub process') </td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>@lang('main.information')</td>
                                    <td>@lang('main.information_additional') </td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>@lang('main.Link')</td>
                                    <td>@lang('main.Link_sequence')</td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                    <td>@lang('main.end')</td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row">@lang('main.Purpose of the procedure:')</label>
                    </div>
                    <textarea class=form-control name="purpose" id="editor" cols="55" rows="5"
                       >{{ $iso->purpose }}</textarea>
    
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row">@lang('main.the introduction')</label>
                    </div>
                    <textarea class=form-control name="introduction" id="editor1" cols="55" rows="5"
                       >{{ $iso->introduction }}</textarea>
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row">@lang('main.Scope of application:')</label>
                    </div>
                    <textarea class=form-control name="scope_of_application" id="editor2" cols="55" rows="5"
                        >{{ $iso->scope_of_application }}</textarea>
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row"> @lang('main.Terms and definitions:')</label>
                    </div>
                    <div style="overflow-x:auto;">
                    <table class="datatable-table table table-bordered mt-2 ">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
    
                                @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                <th data-field="" class="datatable-cell"><span>@lang('main.term')</span></th>
                                <th data-field="" class="datatable-cell"><span>@lang('main.definitions')</span></th>
                            </tr>
                        </thead>
                        <tbody class="datatable-body">
                            @foreach ($iso->definition as $key => $def)
                                <tr class="datatable-row datatable-row-even" id="price-{{ $key }}">
                                    @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $def->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $def->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $def->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
                                    <td class="datatable-cell  ">
                                        <div class="a-col alternate">
                                            <div class="input-field">
                                                <input type="text" class="form-control"
                                                    name="names[{{ $key }}][term]" value="{{ $def->term }}" />
                                            </div>
                                        </div>
                                    </td>
    
                                    <td class="datatable-cell  ">
                                        <div class="a-col alternate">
                                            <div class="input-field">
                                                <input type="text" class="form-control"
                                                    name="names[{{ $key }}][definition]"
                                                    value="{{ $def->definition }}" />
                                            </div>
                                        </div>
                                    </td>
    
                                </tr>
                            @endforeach
                            @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($iso->definition) - 1 }}"
                                            onclick="appendRow({{ count($iso->definition) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                    <td class="datatable-cell"><span></span></td>
    
                                </tr>
                            @endif
                            @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($iso->definition) - 1 }}"
                                            onclick="appendRow({{ count($iso->definition) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                    <td class="datatable-cell"><span></span></td>
    
                                </tr>
                            @endif
                            @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($iso->definition) - 1 }}"
                                            onclick="appendRow({{ count($iso->definition) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                    <td class="datatable-cell"><span></span></td>
    
                                </tr>
                            @endif
                        </tbody>
                    </table>
                     </div>
                    <!-- <textarea class=form-control name="" id="" cols="55" rows="5"
                        placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row"> @lang('main.responsibilities')</label>
                    </div>
                    <textarea class=form-control name="responsibilities" id="editor3" cols="55" rows="5"
                       >{{ $iso->responsibilities }}</textarea>
                </section>
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row"> @lang('main.action_steps')</label>
                    </div>
                    <textarea class=form-control name="action_steps" id="editor4" cols="30" rows="20"
                        placeholder="@lang('main.action_steps')">{{ $iso->action_steps }}</textarea>
                </section>
    
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row">  @lang('main.Models used:')</label>
                    </div>
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                    <th data-field="" class="datatable-cell  end-cell text-center">
                                       <span>@lang('main.m')</span>
                                    </th>
                                @endif
                                <th class="col-4" style="text-align: center;">@lang('main.Model name') </th>
                            <th class="col-1" style="text-align: center;">@lang('main.Model number')</th>
                            <th class="col-2" style="text-align: center;">@lang('main.release_date')</th>
                            <th class="col-2" style="text-align: center;">@lang('main.model_period')</th>
                            <th class="col-2" style="text-align: center;">@lang('main.model_side')</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iso->module as $key => $mod)
                                <tr id="models-{{ $key }}">
                                    @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $mod->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $mod->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
                                    @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $mod->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
    
    
    
                                    <td>
                                        <input class="form-control" type="text"
                                            name="models[{{ $key }}][model_name]" value="{{ $mod->model_name }}"
                                            style="text-align: start;"
                                            placeholder="----------------------------------------------------">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number"
                                            name="models[{{ $key }}][model_number]"
                                            value="{{ $mod->model_number }}" style="text-align: start;"
                                            placeholder="----------------------------------------------------">
                                    </td>
                                    <td>
                                        <input class="form-control" type="date"
                                            name="models[{{ $key }}][model_date]" value="{{ $mod->model_date }}"
                                            style="text-align: start;"
                                            placeholder="----------------------------------------------------">
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="models[0][model_period]"
                                            value="{{ $mod->model_period }}" style="text-align: start;"
                                            placeholder="----------------------------------------------------">
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="models[0][model_side]"
                                            value="{{ $mod->model_side }}" style="text-align: start;"
                                            placeholder="----------------------------------------------------">
                                    </td>
    
                                </tr>
                            @endforeach
                            @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($iso->module) - 1 }}"
                                            onclick="appendRow2({{ count($iso->module) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
    
                            @if (($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($iso->module) - 1 }}"
                                            onclick="appendRow2({{ count($iso->module) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($iso->module) - 1 }}"
                                            onclick="appendRow2({{ count($iso->module) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
    
                    </table>
                     </div>
                    <!-- <textarea class=form-control name="" id="" cols="55" rows="5"
                        placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
                </section>
    
                <section class="row" style="margin: 50px;">
                    <div class="input-group my-3  mx-3">
                        <label class="row"> @lang('main.External and internal reference sources:')</label>
                    </div>
                    <textarea class='shadow-lg form-control' name="reference_sources" id="editor5" cols="55" rows="5"
                        >{{ $iso->reference_sources }}</textarea>
                </section>
                @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($iso->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($iso->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group" style='text-align:center'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px" type="submit"
                    class="btn btn-primary">
                    @lang('main.edit')</button>
            </div> 
                @endif
            </form>
            </div>
                </div>
            </div>
        </div>
    </section>
    </main>
    </div>
    
        <!-- /.content -->
        <div class="modal fade account_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            function appendRow(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="price-${$new_number}">
                                           
                                            <td class="text-center end-td ">
                                                      <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                      </button>
                                            </td>
                                            <td class="datatable-cell  ">
                                                      <div class="a-col alternate">
                                                                <div class="input-field">
                                                                          <input type="text" class="form-control"
                                                                                     name="names[${$new_number}][term]"  />
                                                                </div>
                                                      </div>
                                            </td>
    
                                            <td class="datatable-cell  ">
                                                      <div class="a-col alternate">
                                                                <div class="input-field">
                                                                          <input type="text" class="form-control"
                                                                                     name="names[${$new_number}][definition]"  />
                                                                </div>
                                                      </div>
                                            </td>
                                           
                                           
                                  </tr>`;
                $($appended_text).insertAfter(`#price-0`);
                $(`#btn-${num}`).remove();
                $("#increment").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
    
    
            }
    
            function removeRow(num, id) {
                console.log(id);
                console.log(num);
                if (id != 0) {
                    $("#price-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#price-${num}`).remove();
    
            }
    
    
            function appendRow2(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="models-${$new_number}">
                                           
                                            <td class="text-center end-td ">
                                                      <button type="button" title="Remove" onclick="removeRow2(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                      </button>
                                            </td>
                                          
                                            <td>
                                <input class="form-control" type="text" name="models[${$new_number}][model_name]" style="text-align: start;"
                                    placeholder="----------------------------------------------------">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="models[${$new_number}][model_number]" style="text-align: start;"
                                    placeholder="----------------------------------------------------">
                            </td>
                            <td>
                                <input class="form-control" type="date" name="models[${$new_number}][model_date]" style="text-align: start;"
                                    placeholder="----------------------------------------------------">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="models[${$new_number}][model_period]" style="text-align: start;"
                                    placeholder="----------------------------------------------------">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="models[${$new_number}][model_side]" style="text-align: start;"
                                    placeholder="----------------------------------------------------">
                            </td>
                                           
                                  </tr>`;
                $($appended_text).insertAfter(`#models-${num}`);
                $(`#btn2-${num}`).remove();
                $("#increment2").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn2-${$new_number}" onclick="appendRow2(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
    
    
            }
    
            function removeRow2(num, id) {
                console.log(id);
                console.log(num);
                if (id != 0) {
                    $("#models-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#models-${num}`).remove();
    
            }
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
        <script>
           
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
            CKEDITOR.ClassicEditor.create(document.getElementById("editor1"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
            CKEDITOR.ClassicEditor.create(document.getElementById("editor2"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
            CKEDITOR.ClassicEditor.create(document.getElementById("editor3"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
            CKEDITOR.ClassicEditor.create(document.getElementById("editor4"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
            CKEDITOR.ClassicEditor.create(document.getElementById("editor5"), {
             
                toolbar: {
                    items: [
                      
                        'findAndReplace', 'selectAll', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        
                    ],
                   
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
        </script>
    @stop
    