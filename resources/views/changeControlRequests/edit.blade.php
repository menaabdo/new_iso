@extends('layouts.master')

@section('content')


    <div class="card">
<div class="card-body">
        <h3 style="margin-top:85px;">نموذج طلب التحكم في التغيير (CCR) </h3>
        <hr>
        <form action="{{ route('changeControlRequests.update',$changeControlRequest->id)}}" method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT') 
                  {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2>نموذج طلب التحكم في التغيير (CCR)</h2>
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <img src="{{ asset($changeControlRequest->logo) }}" height=180px width=210px; />
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">عنوان التغيير: </label>
                <div class="col-6">
                    <input type="text" class="form-control" name="address" value="{{$changeControlRequest->address}}">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">الطالب :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="requester" value="{{$changeControlRequest->requester}}">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">تاريخ    :</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1" value="{{$changeControlRequest->date_1}}">
                </div>
            </div>
            <div class="form-group row "> <label for="" class="col-3 col-form-label">الإدارة :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="management" value="{{$changeControlRequest->management}}">
                </div>
            </div>
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
                                    <input type="checkbox"  name="building" value="1" {{ $changeControlRequest->building=="1"? 'checked':'' }}> 
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">المورد / المقاول </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="supplier" value="1" {{ $changeControlRequest->supplier=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">وثيقة </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="document" value="1" {{ $changeControlRequest->document=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">التعبئة  والتغليف   </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="packing" value="1" {{ $changeControlRequest->packing=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">معدات الألة</label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="machine_equipment" value="1" {{ $changeControlRequest->machine_equipment=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">العمليات التصنيعية </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="manufacturing" value="1" {{ $changeControlRequest->manufacturing=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">تخصيص </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="customize" value="1" {{ $changeControlRequest->customize=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">أخرى </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="other" value="1" {{ $changeControlRequest->other=="1"? 'checked':'' }}>
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
    
            <div class="form-group row w-100 text-left">
                <h1 for="" class="form-control" style="background-color: pink;"> المستند المتأثر :</h1>
            </div>
            <div class="form-group row w-100 text-center">
                <table>
                    <tr style="background-color:rgb(187, 199, 250)">
                        <th>م </th>
                        <th> المستند</th>
                    </tr>
                    @if(count($changeControlRequest->affectedDocument)>0)
                    @foreach($changeControlRequest->affectedDocument as $key => $data)
                    <tr id="affectedDocument-{{$key}}">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                              <i class="fa fa-minus-circle"></i>
                            </button>
                          </td>
                        <th><input class="form-control" type="text" name="affectedDocument[{{$key}}][document]" value="{{$data->document}}"></th>
                    </tr>
                    @endforeach
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($changeControlRequest->affectedDocument)-1}}" onclick="appendRow({{count($changeControlRequest->affectedDocument)-1}})"><i
                                class="fa fa-plus-circle"></i></button>
                          </td>
                    </tr>
                @else
                    <tr id="affectedDocument-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="affectedDocument[0][document]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                    class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-left col-2 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">مقدم الطلب   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="applicant" value="{{$changeControlRequest->applicant}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">مدير القسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="section_manager" value="{{$changeControlRequest->section_manager}}">
                                </div>
                            </div>
    
                        </th>
                        <th class=" w-50 text-left col-2 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-2 col-form-label">التاريخ    </label>
                                <div class="col-6">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_2" value="{{$changeControlRequest->date_2}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-2 col-form-label">التاريخ    </label>
                                <div class="col-6">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_3" value="{{$changeControlRequest->date_3}}">
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
                                <input type="radio"  name="change_level" value="low" {{ $changeControlRequest->change_level=="low"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-2 col-form-label text-center">متوسط  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="medium" {{ $changeControlRequest->change_level=="medium"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-2 col-form-label text-center">مرتفع  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="high" {{ $changeControlRequest->change_level=="high"? 'checked':'' }}>
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
            <label for="" class="col-1 col-form-label text-left">مدير الجودة   </label>
            <div class="col-6">
                <input type="text" name="quality_manager" value="{{$changeControlRequest->quality_manager}}">
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
                                <input type="radio"  name="review_damaged_document" value="yes" {{ $changeControlRequest->review_damaged_document=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="review_damaged_document" value="no" {{ $changeControlRequest->review_damaged_document=="no"? 'checked':'' }}>
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
                                <input type="radio" name="stability_study" value="yes" {{ $changeControlRequest->stability_study=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="stability_study" value="no" {{ $changeControlRequest->stability_study=="no"? 'checked':'' }}>
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
                                <input type="radio" name="equipment_qualification" value="yes" {{ $changeControlRequest->equipment_qualification=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="equipment_qualification" value="no" {{ $changeControlRequest->equipment_qualification=="no"? 'checked':'' }}>
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
                                <input type="radio"  name="process_validation" value="yes" {{ $changeControlRequest->process_validation=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="process_validation" value="no" {{ $changeControlRequest->process_validation=="no"? 'checked':'' }}>
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
                                <input type="radio"  name="hygiene_check" value="yes" {{ $changeControlRequest->hygiene_check=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="hygiene_check" value="no" {{ $changeControlRequest->hygiene_check=="no"? 'checked':'' }}>
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
                                <input type="radio" name="recheck" value="yes" {{ $changeControlRequest->recheck=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio" name="recheck" value="no" {{ $changeControlRequest->recheck=="no"? 'checked':'' }}>
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
                                <input type="radio"  name="stability_monitoring" value="yes" {{ $changeControlRequest->stability_monitoring=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-1 col-form-label text-left">لا  </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="stability_monitoring" value="no" {{ $changeControlRequest->stability_monitoring=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
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
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$changeControlRequest->name_1}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-3 col-form-label">مدير مصنع   </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_2" value="{{$changeControlRequest->name_2}}">
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-left col-2 ">
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-2 col-form-label">التاريخ    </label>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="  ......" name="date_4" value="{{$changeControlRequest->date_4}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-2 col-form-label">التاريخ    </label>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="  ......" name="date_5" value="{{$changeControlRequest->date_5}}">
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
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $changeControlRequest->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $changeControlRequest->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $changeControlRequest->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $changeControlRequest->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $changeControlRequest->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $changeControlRequest->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
        </div>
        </form>
    </div>

    <script>


        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="affectedDocument-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="affectedDocument[${$new_number}][document]"></th>
                            </tr>`;
            $($appended_text).insertAfter(`#affectedDocument-${num}`);
            if (!document.getElementById(`affectedDocument-${num}`)) {
                $($appended_text).insertAfter(`#affectedDocument-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
        }

        function removeRow(num, id){
          if(id != 0){
             $("#affectedDocument-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#affectedDocument-${num}`).remove();
            }

      
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
