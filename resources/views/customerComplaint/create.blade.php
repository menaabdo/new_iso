@extends('layouts.master')

@section('content')


<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>

<div class="card">
    <div class="card-body row" style='margin:auto;margin-top:80px'>


        <form action="{{route('customerComplaints.store')}}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>متابعة شكوى عميل</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
                   <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.source_complaint') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="source_complaint">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.type_product_service') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="type_product_service">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.customer_name') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="customer_name">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.place') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="place">
                </div>
            </div>
            <div class="form-group row text-left">
                <label for="" class="col-3 col-form-label">@lang('main.date'):</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row " style="text-align:center;overflow-x:auto;">
                <table class="table ">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                         <th>@lang('main.subject_complaint')</th>
                        <th>@lang('main.The date the complaint was received')</th>
                        <th>@lang('mmain.The date it was sent to the competent departments')</th>
                        <th>@lang('main.The date the response was received')</th>
                        <th>@lang('main.The date the response was sent to the client') </th>
                        <th>@lang('main.Client feedback') </th>
                    </tr>
                    <tr>
                        <th><textarea class="form-control" type="text" name="subject_complaint"></textarea></th>
                        <th><input class="form-control" type="date" name="date_2"></th>
                        <th><input class="form-control" type="date" name="date_3"></th>
                        <th><input class="form-control" type="date" name="date_4"></th>
                        <th><input class="form-control" type="date" name="date_5"></th>
                        <th><textarea class="form-control" type="text" name="nodes"></textarea></th>
                    </tr>
                </table>
            </div>
            <hr class="w-100">
            <div style="" class="w-100 text-center my-4">
                <h4>@lang('main.Marketing and Sales Department (customer satisfaction)') :</h4>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.name') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="name">
                </div>
                </div>
                <div class="form-group row ">
            
                <label for="" class="col-3 col-form-label">@lang('main.date') :</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_6">
                </div>
            </div>
            <hr class="w-100">
          
            
            <table class="table ">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Company Name')</label>
                                <input class="form-control shadow-lg" type="text" name="company_name">
                            </div>
    
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input class="form-control shadow-lg" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
    
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control shadow-lg" type="text" name="date3" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
    
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time">
                            </div>
    
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page">
                            </div>
    
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class='row mt-3'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
        </form>
    </div>


    <style>
        .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid black; */
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
            /* border-bottom: 2px solid black;
            border-top: 2px solid black; */
        }

        #mainDiv {
            height: 150px;
            width: 50px;
            background: #ffffff;
            border: 1px solid rgb(8, 2, 2);
            text-align: center;
            float: left;
            display: inline-table;
        }

    </style>
    @stop
