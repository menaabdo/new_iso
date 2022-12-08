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
<div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
        <div style="" class="w-100 text-center my-4">
        <h2 style='text-align:center;margin-bottom:40px'>
        <img src="{{ asset($interestedPartie->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>
       استمارة الأطراف المهتمة
</span>
    </h2>
            <hr class="w-100">
        </div>
        <div>
            
        </div>
        <br>
        <div class="form-group row w-100 text-right" style="text-align:center ">
            <table class="table" style='border:none'>
                <tr style="background-color:#001635;color:white;  text-align:center;">
                     <th>الأطراف المهتمة</th>
                    <th>الاحتياجات والمتطلبات</th>
                    <th> كيفية تحقيقها</th>
                    <th> كيفية مراقبتها</th>

                </tr>

                @if(count($interestedPartie->interestedPartie)>0)
                @foreach($interestedPartie->interestedPartie as $key => $intr)
                <tr id="interestedPartie-{{$key}}">
                    <th><input class="form-control" type="text" name="interestedPartie[{{$key}}}][names]" value="{{ $intr->names }}"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][needs]" >{{ $intr->needs }}</textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][achieves]" >{{ $intr->achieves }}</textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][watches]" >{{ $intr->watches }}</textarea></th>
                </tr>
                @endforeach
              
               
                @endif
            </table>
        </div>


        <table class="table" style='border:none'>
            <thead>
                <tr>
                    @if ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('Employee') ||$interestedPartie->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة)  :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-10">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                {{$interestedPartie->name_1}}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-10">
                                <label for="" class="col-1 col-form-label">التاريخ:       -</label>
                                "{{$interestedPartie->date_1}}
                            </div>
                        </div>
                    </th>
                    @endif
                    @if(Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة)  :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-10">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                              {{$interestedPartie->name_1}}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-10">
                                <label for="" class="col-1 col-form-label">التاريخ:       -</label>
                               {{$interestedPartie->date_1}}
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $interestedPartie->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $interestedPartie->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                       {{ $interestedPartie->date3 }}
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
                        <label for="" class="" style="text-align: center;;"> رقم الوثيقة : QA – F
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
    border-bottom: 1px solid silver;
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
    float:left;
    display: inline-table;
}
</style>
<script>
  window.addEventListener("load", window.print());
</script>
@stop