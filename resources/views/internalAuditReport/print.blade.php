@extends('layouts.print')
@section('content')
    <div class="container mt-3 p-3">
        <div class="container-fluid p-4">
            <div style="" class="w-100 text-center my-4">
                <h2>تقرير مراجعة داخلية</h2>
                <hr class="w-100">
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-4">
                    <label for="" class="col-4 col-form-label"> بإدارة :</label>
                    {{ $internalAuditReport->manage }}
                </div>
            </div>
            <br><br>
            <div class="container-fluid p-2">
                <section class="my-10 table-bordered">
                    <div class="form-group row w-100 text-right">
                        <label for="" class="col-2 col-form-label">الجهة المراجع عليها:</label>
                        {{ $internalAuditReport->referenced_authority }}
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label"> رقم المراجعة :</label>
                        {{ $internalAuditReport->referenced_number }}
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label"> موضوع المراجعة :</label>
                        {{ $internalAuditReport->referenced_subject }}

                    </div>
                    <br><br>
                    <div class="form-group row w-100 text-right">
                        <div class="col-10">
                            <label for="inputPassword" class="col-2 col-form-label"> رئيس فريق المراجعه :</label>
                            {{ $internalAuditReport->team_lead }}
                        </div>
                    </div>

                    <div class="form-group row w-100 text-right">
                        <div class="col-10">
                            <label for="inputPassword" class="col-2 col-form-label"> فريق المراجعة :</label>
                            {{ $internalAuditReport->team }}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group row w-100 text-right">
                        <label for="" class="col-2 col-form-label">نوع المراجعة :</label>

                        <div class="col-3 col-form-label">
                            <input type="radio" id="planing" name="planing" value="planing" <?php if ($internalAuditReport->planing == 'planing') {
                                echo 'checked="checked"';
                            } ?>>
                            <label for="" style="text-align:left;" class="col-1 col-form-label">مخططة </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="not_planing" name="planing" value="not_planing" <?php if ($internalAuditReport->planing == 'not_planing') {
                                echo 'checked="checked"';
                            } ?>>
                            <label for="" style="text-align:left;" class="col-2 col-form-label">غير مخططة </label>
                        </div>
                    </div>
                </section>

                <br><br>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label"> نتائج المراجعة :</label>
                </div>


                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label"> أ- نقاط القوة : </label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="strong_point" placeholder="  نقاط القوة ......">{{ $internalAuditReport->strong_point }}</textarea>
                    </div>
                </div>
                <br><br>
                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label"> ب- نقاط عدم المطابقة : (ملخص) </label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="no_strong_point" placeholder="  نقاط عدم المطابقة ......">{{ $internalAuditReport->no_strong_point }}</textarea>
                    </div>
                </div>
                <br><br>
                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label"> حالات ملاحظات التحسين: </label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="improvement_notes" placeholder=" حالات ملاحظات التحسين ......">{{ $internalAuditReport->improvement_notes }}</textarea>
                    </div>
                </div>
                <br><br>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label"> نتائج المراجعة :</label>
                </div>

                <div class="form-group row w-100 text-right">

                    <label for="" class="col-1 col-form-label">الاسم :</label>
                    {{ $internalAuditReport->name }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    {{ $internalAuditReport->date_2 }}

                </div>

                <br><br>
                <div class="form-group row w-100 text-right">

                    <label for="" class="col-1 col-form-label">مسئول الجهة المراجع عليها :</label>
                    {{ $internalAuditReport->referance_name }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    {{ $internalAuditReport->date_1 }}

                </div>


            </div>
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $internalAuditReport->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $internalAuditReport->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $internalAuditReport->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                                    - 13 </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

    @stop
