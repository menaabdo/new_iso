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
        <img src="{{ asset($directorList->logo) }}"  style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>قائمة أسماء المديرين والأفراد المصرح لهم بإعداد الوثائق
</span>
</h2>
            <hr class="w-100">
        </div>

        <div>
           
        </div>
        <br><br>
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:#001635;color:white;    width: 20%;">
                    <th>الاسم</th>
                    <th>الوظيفة</th>
                    <th>الاداره</th>
                </tr>
                @if(count($directorList->directorList)>0)
                @foreach($directorList->directorList as $key => $intr)
                    <tr id="directorList-{{ $key }}">
                    <th>{{ $intr->name }}</th>
                    <th>{{ $intr->job }}</th>
                    <th>{{ $intr->manage }}</th>
                </tr>
                @endforeach

                @endif
            </table>
        </div> 


        @if(Auth::user()->hasRole('SuperAdmin'))
                <hr class="w-100">

            <div class=" form-group  text-center">
                <label for=""> اعتماد المدير العام :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $directorList->manager_name }}'>
            </div>
        @endif
            <hr class="w-100">
        <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
       
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                           {{ $directorList->company_name }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                          {{ $directorList->date2 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $directorList->date3 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> مدة
                                الحفظ : سنتان </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: "> رقم
                                الصفحة : 1 / 1</label>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> رقم
                                الوثيقة : QA–F-13 </label>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
</div>

<style>
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