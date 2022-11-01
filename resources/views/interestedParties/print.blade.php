@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">
        <div style="" class="w-100 text-center my-4">
            <h2> استمارة الأطراف المهتمة</h2>
            <hr class="w-100">
        </div>
        <div>
            <img src="{{ public_path($interestedPartie->logo) }}" style="float: left;" width="100px" height="50px" />
            
        </div>
        <br>
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:rgb(227, 252, 160)">
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

        <hr size="20" color="red">
        <table class="table">
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
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $interestedPartie->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $interestedPartie->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                       {{ $interestedPartie->date3 }}
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
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
@stop