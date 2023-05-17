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
    #ip1 {
    border-radius: 18px;
     border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 15px;    
}

#ip2 {
    border-radius: 25px;
    border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 15px;    
}

#ip3 {
    border-radius: 15px 50px 30px 5px;
     border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 15px; 
}

#ip4 {
    border-radius: 15px 50px 30px;
    border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 15px; 
}
@media only screen and (max-width: 500px) {
    textarea{
        width:200px !important;

    }
    }
</style>
<div class="card row" style='width:100%;;margin:auto'>
    <div class="card-body row" style='width:90%;margin:auto'>
      
        <form action="{{ route('swot.update',$swot->id)}}" method="post" style='margin:auto;margin-top:50px;' enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style="text-shadow: 1px 1px 1px #3ed3ea;">تحليل(SWOT) </h2>
                <hr class="w-100">
            </div>
            <div class=' row p-3 w-100 text-center mb-3'>
            <label for="" class="col-3 col-form-label"> CO LOGO</label>
              
                 <input type="file" id="img" name="logo" accept="image/*">
                 <img src="{{ asset($swot->logo) }}" height=100px width=100px; />
              
            </div>
            <div class="form-group row w-100 text-center">
                <label for="" class="col-3 col-form-label"> الاسم :</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="name_1" value="{{$swot->name_1}}">
                </div>
            </div>
            <div class="form-group row w-100 text-center">
                <label for="" class="col-3 col-form-label"> التاريخ :</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="date_1" value="{{$swot->date_1}}">
                </div>
            </div>
            <div class=" form-group row  w-200 text-center">
                
                    <label for="" class="col-3 col-form-label text-center">نقاط القوة :</label>
                   
                    <div class="col-4">
                    <textarea type="text" id="ip1" class="form-control" name="strength_point" placeholder=""
                        style=" height: 300px; width: 300px;">{{$swot->strength_point}}</textarea>
             </div>
             </div>
             <div class=" form-group row  w-200 text-center">
                
                        <label for="" class="col-3 col-form-label text-center">الفرص :</label>
                        <div class="col-4">
                   
                    <textarea type="text" id="ip2" name="opportunities" class="form-control" placeholder=""
                        style=" height: 300px; width: 300px;">{{$swot->opportunities}}</textarea>
                        </div>
                </div>

                <div class=" form-group row  w-200 text-center">
                
                    <label for="" class="col-3 col-form-label text-center"> نقاط الضعف :</label>
                    <div class="col-4">
                   
                    <textarea type="text" id="ip3" class="form-control" name="weak_point" placeholder=""
                        style=" height: 300px; width: 300px;">{{$swot->weak_point}}</textarea>
                    </div>
                    </div>
                    <div class=" form-group row  w-200 text-center">
                
                        <label for="" class="col-3 col-form-label text-center">التهديدات :</label>
                        <div class="col-4">
                    <textarea type="text" id="ip4" name="threat" class="form-control" placeholder=""
                        style=" height: 300px; width: 300px;">{{$swot->threat}}</textarea>
                        </div>
                </div>
            
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
           
            <table class="table">
                <thead>
                    <tr>
                        <th>
                          <div class="" style="text-align:start ;">
                          <label>اسم الشركة</label>
                            <input class="form-control" type="text" name="company_name"   value="{{ $swot->company_name }}">
                          </div>
                
                        </th>
                        <th>
                          <div class="" style="text-align:start ;">
                          <label>تاريخ الاصدار</label>
                            <input class="form-control" type="text" name="date2"  value="{{ $swot->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
                
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ التعديل</label>
                                <input class="form-control" type="text" name="date3"  value="{{ $swot->date3 }}" focus="(this.type='date')" onblur="(this.type='text')">
                              </div>
                
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $swot->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $swot->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $swot->number_doc }}">
                            </div>
                        </th>
                      </tr>
                </thead>
            </table>
</div>
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    تعديل</button>
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
