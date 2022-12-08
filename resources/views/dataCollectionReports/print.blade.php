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

</style>


<div class="card">
<div class="card-body" style='text-align:center'>
 
        <div style="" class="w-100 text-center my-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '> 
           <h3 style='text-align:center;margin-bottom:40px'>
           <img src="{{ asset($dataCollectionReport->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
           <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> تقرير جمع و تحليل البيانات
</span> 
</h3>
            <hr class="w-100">
        </div>
        <div>
           
        </div>

        <div class="form-group row ">
            <div class="col-6" style='margin-bottom:10px'>
                <label for="" class="col-3 col-form-label">التاريخ:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{$dataCollectionReport->date_1}}'>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">القسم:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{$dataCollectionReport->department}}'>
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">البيانات المطلوبة :</label>
            <div class="col-6">
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
             
                {{$dataCollectionReport->date_details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">التفاصيل :</label>
            <div class="col-6">
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
             
               {{$dataCollectionReport->details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">النتائج :</label>
            <div class="col-6">
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
             
               {{$dataCollectionReport->result}}</textarea>
            </div>
        </div>
        @if ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('Employee') || $dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Employee'))
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= '   {{$dataCollectionReport->name_1}}'>
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
        <hr class="w-100">
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
             {{$dataCollectionReport->name_1}}
            </div>
        </div>
        @endif
        <hr class="w-100">
        <table class="table" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                     {{ $dataCollectionReport->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $dataCollectionReport->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                            {{ $dataCollectionReport->date3 }}
                          </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
                          - 13 </label>
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
    float:left;
    display: inline-table;
}
</style>
<script>
  window.addEventListener("load", window.print());
</script>
@stop