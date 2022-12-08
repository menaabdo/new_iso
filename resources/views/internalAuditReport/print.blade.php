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
    <div class="container mt-3 p-3" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
        
        <div class="container-fluid p-4">
            <div style="" class="w-100 text-center my-4">
            <h2 style='text-align:center;margin-bottom:40px'>
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>تقرير مراجعة داخلية</span></h2>
                
            </div>
            <div class="form-group row w-100 text-left" style='text-align:center'> 
                <div class="col-4">
                    <label for="" class="col-4 col-form-label"> بإدارة :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $internalAuditReport->manage }}'>
                </div>
            </div>
            <br><br>
            <div class="container-fluid p-2">
                <section class="my-10 table-bordered">
                    <div class="form-group row w-100 text-right">
                        <label for="" class="col-2 col-form-label">الجهة المراجع عليها:</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $internalAuditReport->referenced_authority }}'>
                       
                        <label for="" class="col-2 col-form-label" style='margin-bottom:12px'> رقم المراجعة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $internalAuditReport->referenced_number }}'>
                      </div>
                    
                      <div style='margin-top:12px;margin-bottom:12px;'>
                        <label for="" class="col-2 col-form-label" style='    margin-left: 23px;'> موضوع المراجعة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $internalAuditReport->referenced_subject }}'>
<label for="inputPassword" class="col-2 col-form-label" style='    margin-left: 26px;'> فريق المراجعة :</label>
                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $internalAuditReport->team }}'>
                  
                    </div>
                 
                    <div class="form-group row w-100 text-right">
                        <div class="col-10" style='margin-bottom:12px'>
                            <label for="inputPassword" class="col-2 col-form-label"> رئيس فريق المراجعه :</label>
                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $internalAuditReport->team_lead }}'>
                        </div>
                    </div>

                    <div class="form-group row w-100 text-right">
                        <div class="col-10">
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
                  
                        <textarea type="text" class="form-control" name="strong_point" style='vertical-align: middle;' placeholder="  نقاط القوة ......">{{ $internalAuditReport->strong_point }}</textarea>
                   
                    <label for="inputPassword" class="col-2 col-form-label"> ب- نقاط عدم المطابقة : (ملخص) </label>
                   
                        <textarea type="text" class="form-control" name="no_strong_point" style='vertical-align: middle;' placeholder="  نقاط عدم المطابقة ......">{{ $internalAuditReport->no_strong_point }}</textarea>
                    
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
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $internalAuditReport->name }}'>
                   
                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $internalAuditReport->date_2 }}'>

                </div>

                <br><br>
                <div class="form-group row w-100 text-right">

                    <label for="" class="col-1 col-form-label">مسئول الجهة المراجع عليها :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $internalAuditReport->referance_name }}'>
                    

                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $internalAuditReport->date_1 }}'>

                </div>


            </div>
            <br><br>
            <table class=" table-bordered" style=' border:none;
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
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : QA – F
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
<script>
  window.addEventListener("load", window.print());
</script>
    @stop
