@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }
    #ip1 {
    border-radius: 18px;
     border: 2px solid #609;
    padding: 20px; 
    
}

#ip2 {
     border-radius: 18px;
    border: 2px solid #609;
    padding: 20px; 
    
}

#ip3 {
     border-radius: 18px;
     border: 2px solid #609;
    padding: 20px; 
   
}

#ip4 {
     border-radius: 18px;
    border: 2px solid #609;
    padding: 20px; 
   
}
</style>

    <div class="card">
        <div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
            <h3 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($swot->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
            <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>تحليل(SWOT)</span>
            </h3>
            <hr>
            <div>
              
            </div>
            <br><br>
            <div class="form-group row w-100 text-left">
                <div class="col-4" style='margin:12px'>
                    <label for="" class="col-1 col-form-label"> الاسم :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $swot->name_1 }}'>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-4">
                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $swot->date_1 }}'>
                </div>
            </div>
            <br>
            <div class=" form-group row  w-200 text-center">
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center">نقاط القوة :</label>
                    <br><br>
                    <textarea type="text" id="ip1" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $swot->strength_point }}</textarea>
                </div>
                <br>
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center">الفرص :</label>
                    <br><br>
                    <textarea type="text" id="ip2" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $swot->opportunities }}</textarea>
             
                       </div>
                <br>
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center"> نقاط الضعف :</label>

                    <br><br>
                    <textarea type="text" id="ip3" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $swot->weak_point }}</textarea>
             
                  
                </div>
                <br>
                <div>
                    <label for="" class="col-5 col-form-label text-center">التهديدات :</label>
                    <br><br>
                    <textarea type="text" id="ip4" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $swot->threat }}</textarea>
             
                   
                </div>
                <br>
            </div>
            <hr class="w-100">
            <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
  
                <thead>
                    <tr>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                {{ $swot->company_name }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                {{ $swot->date2 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                {{ $swot->date3 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ :
                                   {{ $swot->period_time }} </label>
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة :  
                                    {{ $swot->number_page }}
                                    </label>
                            </div>
                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : 
                                    {{ $swot->number_doc }} </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

        </div>
        <style>
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid black;
            }

            table,
            th,
            td,
            tr {
                border: 1px solid black;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
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
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
