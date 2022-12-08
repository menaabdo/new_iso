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

</style>
    <div class="container p-3" style='border:1px solid'>
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-align:center'>
                <span style='font-family:Cursive;border-bottom: 1px solid;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 4;
}'>متابعة نتائج المراجعة الداخلية </span>

                </h2>
                  </div>
            <div class="form-group row w-100 text-right">
               
                <div class="col-4" style='text-align:center'>
                    <label for="" class="col-1 col-form-label"> ادارة :</label>
                  {{ $interior->management }}
                </div>
            </div>
            <!--  -->
            <!--  -->
            <br><br>
            <section class="my-5 table-bordered">
                <table class="table table-bordered  text-center "
                    style="grid-auto-flow: column;justify-content: center; align-content: center;">
                    <thead>
                        <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                    
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>وصف حالة عدم المطابقة </th>
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>الإجراء التصحيحي / الوقائي المطلوب</th>
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>رقم الإجراء</th>
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>المسئول عن التنفيذ</th>
                            <th scope="col" colspan="2" style='vertical-align: middle;'>متابعة التنفيذ</th>
                        </tr>
                        <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                    
                            <th scope="col" style='vertical-align: middle;'> مخطط</th>
                            <th scope="col" style='vertical-align: middle;'>فعلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($interior->interior) > 0)
                            @foreach ($interior->interior as $key => $intr)
                                <tr id="interior-{{ $key }}" style='text-align:center'>
                                   
                                        <td>
                                            
                                            <div class="form-row ">
                            <textarea type="text" class="form-control shadow-lg "  style="">
                            {{ $intr->non_conformity }}
                            </textarea>

                        </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                            <textarea readonly type="text" class="form-control shadow-lg "  style="">
                                            {{ $intr->corrective_action }}
                            </textarea>
                                              
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                            <textarea readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;height: 80px;
    text-align: center;width: 110px;'>
                                             {{ $intr->action_number }}</textarea>  
                                            
                                             
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;height: 80px;
    text-align: center;' value='  {{ $intr->implementation }}'>
                                           
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                            <textarea readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;height: 80px;
    text-align: center;width: 60px;'>{{ $intr->planned }}</textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                            <textarea readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;height: 80px;
    text-align: center;width: 60px;'>{{ $intr->actual }}</textarea>
                                            </div>
                                        </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <br><br>
                @if (Auth::user()->hasRole('SuperAdmin'))
                <div style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);width: 80%;
    margin: auto;
    border-radius: 10px;'>
                    <div class="form-group row w-100 text-right">
                        <div class="col-10" style='    text-align: center;    padding: 12px; '>
                            <label class="col-2 col-form-label"> رئيس فريق المراجعه :</label>
                            {{ $interior->head_of_the_review }}
                        </div>
                    </div>
                    <div class="form-group row w-100 text-right" style='padding:10px'>
                        <div class="col-4" style='    text-align: center;'>                            
                        <label for="" class="col-1 col-form-label"> الاسم :</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $interior->name }}
                        <label for="" class="col-1 col-form-label" style='padding:10px'> التاريخ :</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $interior->date }}
                        
                    </div>
                    </div>
                    <div class="form-group row w-100 text-right">
                    
                        <div class="col-4" style='    text-align: center;'>
                       
                             </div>
                    </div>
                    </div>
                @endif
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
                                   {{ $interior->company_name }}
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                {{ $interior->date2 }}
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                 {{ $interior->date3 }}
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                 {{ $interior->period }}
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
                                        style="text-align: center;;"> رقم الوثيقة : QA –
                                        F
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
