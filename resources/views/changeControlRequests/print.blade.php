@extends('layouts.print')

@section('content')
<div class="card">
    <div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2>نموذج طلب التحكم في التغيير (CCR)</h2>
                <hr class="w-100">
            </div>
            <div>
                <img src="{{ public_path($changeControlRequest->logo) }}" style="float: left;" width="100px"
                    height="50px" />

            </div>
            <br><br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">عنوان التغيير: </label>
                {{$changeControlRequest->address}}
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">الطالب :</label>
                    {{$changeControlRequest->requester}}
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">تاريخ    :</label>
                   {{$changeControlRequest->date_1}}
                </div>
            </div>
            <div class="col-6">
                    <div class="form-group row "> <label for="" class="col-3 col-form-label">الإدارة :</label>
                   {{$changeControlRequest->management}}
                </div>
            </div>
            <br>
            <hr class="w-100">
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> التغييرات المطلوبة:</h1>
            </div>
            <table class="table table-bordered">
                <thead>
    
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">المرافق / المباني </label>
                                <div class="col-2 col-form-label">
                                     <input type="checkbox"  name="building" value="1" {{ $changeControlRequest->building=="1"? 'checked':'' }}
                                     <?php if ($changeControlRequest->building== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                     >
                                     
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">المورد / المقاول </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="supplier" value="1" {{ $changeControlRequest->supplier=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->supplier== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">وثيقة </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="document" value="1" {{ $changeControlRequest->document=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->document== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">التعبئة  والتغليف   </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="packing" value="1" {{ $changeControlRequest->packing=="1"? 'checked':'' }}
                                    
                                    <?php if ($changeControlRequest->packing== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">معدات الألة</label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="machine_equipment" value="1" {{ $changeControlRequest->machine_equipment=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->machine_equipment== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">العمليات التصنيعية </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="manufacturing" value="1" {{ $changeControlRequest->manufacturing=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->manufacturing== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">تخصيص </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="customize" value="1" {{ $changeControlRequest->customize=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->customize== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">أخرى </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="other" value="1" {{ $changeControlRequest->other=="1"? 'checked':'' }}
                                    <?php if ($changeControlRequest->other== '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    >
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <hr class="w-100">
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> الوصف :</h1>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="description"> {{$changeControlRequest->description}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> السبب :</h1>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="reasone"> {{$changeControlRequest->reasone}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> تغيير المقترح :</h1>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="suggested_change">{{$changeControlRequest->suggested_change}}</textarea>
                </div>
            </div>
    <br><br>
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> المستند المتأثر :</h1>
            </div>
            <div class="form-group row w-100 text-center">
                <table>
                    <tr style="background-color:rgb(187, 199, 250)">
                        <th> المستند</th>
                    </tr>
                    @if(count($changeControlRequest->affectedDocument)>0)
                    @foreach($changeControlRequest->affectedDocument as $key => $data)
                    <tr id="affectedDocument-{{$key}}">
                       
                        <th><input class="form-control" type="text" name="affectedDocument[{{$key}}][document]" value="{{$data->document}}"></th>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-left col-2 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">مقدم الطلب   </label>
                                <div class="col-6">
                              {{$changeControlRequest->applicant}}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">مدير القسم   </label>
                                <div class="col-6">
                                    {{$changeControlRequest->section_manager}}
                                </div>
                            </div>
    
                        </th>
                        <th class=" w-50 text-left col-2 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-2 col-form-label">التاريخ    </label>
                                <div class="col-6">
                                {{$changeControlRequest->date_2}}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-2 col-form-label">التاريخ    </label>
                                <div class="col-6">
                                 {{$changeControlRequest->date_3}}
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-left">
            <label for="" class="col-1 col-form-label"> 	مستوي التغيير :</label>
        </div>
        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-2 col-form-label text-center">منخفض   </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="low" {{ $changeControlRequest->change_level=="low"? 'checked':'' }}
                                <?php if ($changeControlRequest->change_level=="low") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-2 col-form-label text-center">متوسط  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="medium" {{ $changeControlRequest->change_level=="medium"? 'checked':'' }}
                                <?php if ($changeControlRequest->change_level=="medium") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-2 col-form-label text-center">مرتفع  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="high" {{ $changeControlRequest->change_level=="high"? 'checked':'' }}
                                <?php if ( $changeControlRequest->change_level=="high") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <div class="form-group row w-100 text-left">
            <h1 for="" class="form-control" style="background-color: pink;">وصف توكيد الجودة : </h1>
        </div>
        <div class="form-group row w-100 text-left">
            <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="quality_assurance">{{$changeControlRequest->quality_assurance}}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-left">
            <div class="col-6">
                <label for="" class="col-1 col-form-label text-left">مدير الجودة   </label>
               {{$changeControlRequest->quality_manager}}
            </div>
        </div>
        <div class="form-group row w-100 text-left">
            <h1 for="" class="form-control" style="background-color: pink;"> التدابير الواجب اتخاذها بعد تنفيذ التغيير : </h1>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">1- مراجعة جميع المستندات المتضررة </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="review_damaged_document" value="yes" {{ $changeControlRequest->review_damaged_document=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->review_damaged_document=="yes") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="review_damaged_document" value="no" {{ $changeControlRequest->review_damaged_document=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->review_damaged_document=="no") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">2- دراسة الاستقرار  </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="stability_study" value="yes" {{ $changeControlRequest->stability_study=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->stability_study=="yes") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="stability_study" value="no" {{ $changeControlRequest->stability_study=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->stability_study=="no") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">3- تأهيل المعدات </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="equipment_qualification" value="yes" {{ $changeControlRequest->equipment_qualification=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->equipment_qualification=="yes") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="equipment_qualification" value="no" {{ $changeControlRequest->equipment_qualification=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->equipment_qualification=="no") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">4- التحقق من صحة العملية </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="process_validation" value="yes" {{ $changeControlRequest->process_validation=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->process_validation=="yes") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="process_validation" value="no" {{ $changeControlRequest->process_validation=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->process_validation=="no") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">5- التحقق من النظافة </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="hygiene_check" value="yes" {{ $changeControlRequest->hygiene_check=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->hygiene_check=="yes") {
                                    echo 'checked="checked"';
                                } ?>
                                >
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="hygiene_check" value="no" {{ $changeControlRequest->hygiene_check=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->hygiene_check=="no") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">6- إعادة التحقق </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="recheck" value="yes" {{ $changeControlRequest->recheck=="yes"? 'checked':'' }}
                                <?php if ($changeControlRequest->recheck=="yes") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="recheck" value="no" {{ $changeControlRequest->recheck=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->recheck=="no") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">7- برنامج مراقبة الاستقرار </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">نعم  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="stability_monitoring" value="yes" {{ $changeControlRequest->stability_monitoring=="yes"? 'checked':'' }}
                                <?php if ( $changeControlRequest->stability_monitoring=="yes") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="stability_monitoring" value="no" {{ $changeControlRequest->stability_monitoring=="no"? 'checked':'' }}
                                <?php if ($changeControlRequest->stability_monitoring=="no") {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <br><br>
        <div class="form-group row w-100 text-left">
            <h1 for="" class="form-control" style="background-color: pink;"> تغيير الموافقة على التحكم : </h1>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class=" w-50 text-left col-2 ">
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-3 col-form-label">مدير مراقبة الجودة  </label>
                            <div class="col-6">
                                {{$changeControlRequest->name_1}}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-3 col-form-label">مدير مصنع   </label>
                            <div class="col-6">
                                {{$changeControlRequest->name_2}}
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-left col-2 ">
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-2 col-form-label">التاريخ    </label>
                            <div class="col-6">
                               {{$changeControlRequest->date_4}}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-2 col-form-label">التاريخ    </label>
                            <div class="col-6">
                                    {{$changeControlRequest->date_5}}
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>


       
        <hr class="w-100">
           
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                    {{ $changeControlRequest->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $changeControlRequest->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $changeControlRequest->date3 }}
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

    <script>





      
    </script>
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
@stop
