@extends('layouts.master')
@section('content')



<div class="container mt-3 p-3">
    <h3 style="margin-top:85px;">تقرير مراجعة داخلية </h3>
    <hr>
    
<form action="{{route('InternalAuditReport.update',$internalAuditReport->id)}}" method="post" enctype="multipart/form-data" id="fo1">
    @method('PUT') 
          {{ csrf_field() }}
    <div class="container-fluid p-4">
        <div style="" class="w-100 text-center my-4">
            <h2>تقرير مراجعة داخلية</h2>
            <hr class="w-100">
        </div>
        <div class="form-group row w-100 text-left">
            <label for="" class="col-4 col-form-label">   بإدارة    :</label>
            <div class="col-4">
                <input type="text" class="form-control" name="manage" value="{{ $internalAuditReport->manage }}">
            </div>
        </div>
        <div class="container-fluid p-2">
            <section class="my-10 table-bordered">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">الجهة المراجع عليها:</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="referenced_authority" value="{{ $internalAuditReport->referenced_authority }}" placeholder="الجهة المراجع عليها   ......" id="">
                    </div>
                    <label for="" class="col-2 col-form-label">  رقم المراجعة :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="referenced_number"placeholder="رقم المراجعة   ......" value="{{ $internalAuditReport->referenced_number }}">
                    </div>
                    <label for="" class="col-2 col-form-label">   موضوع المراجعة         :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="referenced_subject" value="{{ $internalAuditReport->referenced_subject }}" placeholder="موضوع المراجعة    ......" id="">
                    </div>
                </div>
                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label">   رئيس فريق المراجعه       :</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="رئيس فريق المراجعه  ......" name="team_lead" value="{{ $internalAuditReport->team_lead }}">
                    </div>
                </div>

                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label">   فريق المراجعة       :</label>
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="فريق المراجعة  ......" name="team" value="{{ $internalAuditReport->team }}">
                    </div>
                </div>

                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">نوع المراجعة :</label>

                    <label for="" style="text-align:left;" class="col-1 col-form-label">مخططة </label>
                    <div class="col-3 col-form-label">
                        <input type="radio" id="planing" name="planing" value="planing"  <?php if ( $internalAuditReport->planing == 'planing') echo 'checked="checked"'; ?>>
                    </div>


                    <label for="" style="text-align:left;" class="col-2 col-form-label">غير مخططة </label>
                    <div class="col-1 col-form-label">
                        <input type="radio" id="not_planing" name="planing" value="not_planing" <?php if ($internalAuditReport->planing == 'not_planing') echo 'checked="checked"'; ?>>
                    </div>
                </div>
            </section>


            <div class="form-group row w-100 text-right">
                <label for="" class="col-2 col-form-label">   نتائج المراجعة        :</label>
            </div>


            <div class="form-group row w-100 text-right">
                <label for="inputPassword" class="col-2 col-form-label">   أ- نقاط القوة :      </label>
                <div class="col-10">
                    <textarea type="text" class="form-control" name="strong_point" placeholder="  نقاط القوة ......">{{ $internalAuditReport->strong_point }}</textarea>
                </div>
            </div>

            <div class="form-group row w-100 text-right">
                <label for="inputPassword" class="col-2 col-form-label">   ب- نقاط عدم المطابقة : (ملخص)      </label>
                <div class="col-10">
                    <textarea type="text" class="form-control" name="no_strong_point" placeholder="  نقاط عدم المطابقة ......">{{ $internalAuditReport->no_strong_point }}</textarea>
                </div>
            </div>

            <div class="form-group row w-100 text-right">
                <label for="inputPassword" class="col-2 col-form-label">  حالات ملاحظات التحسين:      </label>
                <div class="col-10">
                    <textarea type="text" class="form-control" name="improvement_notes" placeholder=" حالات ملاحظات التحسين ......">{{ $internalAuditReport->improvement_notes }}</textarea>
                </div>
            </div>

            <div class="form-group row w-100 text-right">
                <label for="" class="col-2 col-form-label">   نتائج المراجعة        :</label>
            </div>

            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label">الاسم :</label>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="الاسم    ......" name="name" value="{{ $internalAuditReport->name }}">
                </div>
               
                <label for="" class="col-1 col-form-label">   التاريخ         :</label>
                <div class="col-3">
                    <input type="date" class="form-control" placeholder="موضوع المراجعة    ......" name="date_2" value="{{ $internalAuditReport->date_2 }}">
                </div>
            </div>
            <div class="form-group row w-100 text-right">
                <label for="" class="col-2 col-form-label">   نتائج المراجعة        :</label>
            </div>

            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label">مسئول الجهة المراجع عليها  :</label>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="الاسم    ......" name="referance_name" value="{{ $internalAuditReport->referance_name }}">
                </div>
                
                <label for="" class="col-1 col-form-label">   التاريخ         :</label>
                <div class="col-4">
                    <input type="date" class="form-control" placeholder="موضوع المراجعة    ......" name="date_1" value="{{ $internalAuditReport->date_1 }}">
                </div>
            </div>


        </div>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  <div class="" style="text-align:start ;">
                    <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $internalAuditReport->company_name }}">
                  </div>
        
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <input class="form-control" type="text" name="date2" value="{{ $internalAuditReport->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
        
                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date3" value="{{ $internalAuditReport->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
        
                </th>
              <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $internalAuditReport->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $internalAuditReport->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $internalAuditReport->number_doc }}">
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
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @stop