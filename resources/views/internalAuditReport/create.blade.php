@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    /* @media only screen and (max-width: 400px) {
    .text-right{
        text-align: right !important;
    }
    } */
</style>
<div class="container mt-3 p-3 card row text-right">


    <form action="{{route('InternalAuditReport.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-10' style='margin:auto'>
        {{ csrf_field() }}

        <div class="container-fluid p-4">
            <div style="text-shadow: 1px 1px 1px #3ed3ea;" class="w-100 text-center my-4">
                <h2>تقرير مراجعة داخلية</h2>
                <hr class="w-100">
            </div>
            <div class="form-group "  style='text-align: center;'>
                <label for="" class="col-4 col-form-label" style='margin:auto'> بإدارة :</label>
                <div class="col-4" style='margin:auto'>
                    <input type="text" class="form-control shadow-lg" name="manage">
                </div>
            </div>
            <div class="container-fluid p-2">
                <section class="my-10 table-bordered">
                    <div class="form-group row w-100  mt-4">
                        <label for="" class="col-md-4 col-form-label mb-4">الجهة المراجع عليها:</label>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control shadow-lg" name="referenced_authority" id="">
                        </div>
                        <label for="" class="col-md-4  col-form-label mb-4 "> رقم المراجعة :</label>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control shadow-lg " name="referenced_number" id="">
                        </div>
                        <label for="" class="col-md-4  col-form-label"> موضوع المراجعة :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="referenced_subject" id="">
                        </div>
                    </div>
                    <div class="form-group row w-100">
                        <label for="inputPassword" class="col-md-4 col-form-label"> رئيس فريق المراجعه :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="team_lead">
                        </div>
                    </div>

                    <div class="form-group row w-100 ">
                        <label for="inputPassword" class="col-md-4 col-form-label"> فريق المراجعة :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="team">
                        </div>
                    </div>

                    <div class="form-group row w-100 " style='margin:auto'>
                        <label for="" class="col-md-4 col-form-label">نوع المراجعة :</label>
                        <div class=" col-form-label pl-2 col-4 d-flex justify-content-center" style='margin:auto;'>
                      
                        <label for="" style="text-align:left;" class="col-md-4 col-form-label">مخططة </label>
                        <div class=" col-form-label pr-1">
                       
                       <input type="radio" style='margin-top:6px' id="planing" name="planing" value="planing" class='shadow-lg'>
                       </div>
                          </div>

                          <div class=" col-form-label pl-2 col-4 d-flex justify-content-center" style='margin:auto;'>
                     
                        <label for="" style="text-align:left;" class="col-md-6 col-form-label">غير مخططة </label>
                        <div class=" col-form-label pr-1">
                            <input type="radio" id="not_planing" style='margin-top:6px' name="planing" value="not_planing" class='shadow-lg'>
                        </div>
                        </div>
                    </div>

                </section>

                <section class="my-10 table-bordered text-center">
                <div class="form-group row w-100  mt-4">
                    <label for="" class="col-md-5 col-form-label" style="text-shadow: 1px 1px 1px #3ed3ea;margin:auto"> نتائج المراجعة :</label>
                </div>


                <div class="form-group row w-100 ">
                    <label for="inputPassword" class="col-md-5 col-form-label "> أ- نقاط القوة : </label>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control shadow-lg" name="strong_point"></textarea>
                    </div>
                </div>

                <div class="form-group row w-100 " style='margin:auto'>
                    <label for="inputPassword" class="col-md-5 col-form-label"> ب- نقاط عدم المطابقة : (ملخص) </label>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control shadow-lg text-center" name="no_strong_point" placeholder="  نقاط عدم المطابقة ......"></textarea>
                    </div>
                </div>

                <div class="form-group row w-100 ">
                    <label for="inputPassword" class="col-md-5 col-form-label"> حالات ملاحظات التحسين: </label>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control shadow-lg text-center" name="improvement_notes" placeholder=" حالات ملاحظات التحسين ......"></textarea>
                    </div>
                </div>
                </section>
                <hr>
                <div class="form-group row w-100 ">
                    <label for="" class="col-4 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;margin:auto'> نتائج المراجعة :</label>
                </div>

                <div class="form-group row w-100 ">
                    <label for="" class="col-md-5 col-form-label">الاسم :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control shadow-lg text-center" placeholder="الاسم    ......" name="name">
                    </div>

                    <label for="" class="col-md-5 col-form-label"> التاريخ :</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control shadow-lg text-center" placeholder="موضوع المراجعة    ......" name="date_2">
                    </div>
                </div>
                <hr>
                <div class="form-group row w-100 ">
                    <label for="" class="col-3 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;margin:auto'> نتائج المراجعة :</label>
                </div>

                <div class="form-group row w-100 ">
                    <label for="" class="col-md-4 col-form-label">مسئول الجهة المراجع عليها </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control shadow-lg text-center" placeholder="الاسم    ......" name="referance_name">
                    </div>

                    <label for="" class="col-md-4 col-form-label mt-3"> التاريخ </label>
                    <div class="col-md-10">
                        <input type="date" class="form-control shadow-lg mt-3 text-center" placeholder="موضوع المراجعة    ......" name="date_1">
                    </div>
                </div>


            </div>
            <div class='row'>
                <table class="table table-bordered col-md-12">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>اسم الشركة</label>
                                    <input class="form-control shadow-lg" type="text" name="company_name">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>تاريخ الاصدار</label>
                                    <input class="form-control shadow-lg" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>تاريخ التعديل</label>
                                    <input class="form-control shadow-lg" type="text" name="date3" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label> مدة الحفظ </label>
                                    <input class="form-control shadow-lg" type="text" name="period_time">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label> رقم الصفحة </label>
                                    <input class="form-control shadow-lg" type="text" name="number_page">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label> رقم الوثيقة </label>
                                    <input class="form-control shadow-lg" type="text" name="number_doc">
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@stop
