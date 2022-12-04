@extends('layouts.print')
@section('content')

<div class="card">
<div class="card-body">

        <div style="" class="w-100 text-center my-4">
            <h2>قائمة أسماء المديرين والأفراد المصرح لهم بإعداد الوثائق</h2>
            <hr class="w-100">
        </div>

        <div>
            <img src="{{ asset($directorList->logo) }}" style="float: left;" width="100px" height="50px" />
           
        </div>
        <br><br>
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:rgb(227, 252, 160)">
 
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
        </div>

        @if(Auth::user()->hasRole('SuperAdmin'))
                <hr class="w-100">

            <div class=" form-group  text-center">
                <label for=""> اعتماد المدير العام :</label>
               {{ $directorList->manager_name }}
            </div>
        @endif
            <hr class="w-100">
        <table class="table">
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
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                الحفظ : سنتان </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                الصفحة : 1 / 1</label>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
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