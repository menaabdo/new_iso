@extends('layouts.print')
@section('content')
    <div class="container p-3">
            <div style="" class="w-100 text-center my-4">
                <h2>متابعة نتائج المراجعة الداخلية </h2>
                <hr class="w-100" style="align:center">
            </div>
            <div class="form-group row w-100 text-right">
               
                <div class="col-4">
                    <label for="" class="col-1 col-form-label"> ادارة :</label>
                  {{ $interior->management }}
                </div>
            </div>
            <br><br>
            <section class="my-5 table-bordered">
                <table class="table table-bordered  text-center "
                    style="grid-auto-flow: column;justify-content: center; align-content: center;">
                    <thead>
                        <tr style="background-color:lightgreen">
                            <th scope="col" rowspan="2">وصف حالة عدم المطابقة </th>
                            <th scope="col" rowspan="2">الإجراء التصحيحي / الوقائي المطلوب</th>
                            <th scope="col" rowspan="2">رقم الإجراء</th>
                            <th scope="col" rowspan="2">المسئول عن التنفيذ</th>
                            <th scope="col" colspan="2">متابعة التنفيذ</th>
                        </tr>
                        <tr style="background-color:rgb(144, 196, 238)">
                            <th scope="col"> مخطط</th>
                            <th scope="col">فعلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($interior->interior) > 0)
                            @foreach ($interior->interior as $key => $intr)
                                <tr id="interior-{{ $key }}">
                                   
                                        <td>
                                            <div class="form-row ">
                                                {{ $intr->non_conformity }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                               {{ $intr->corrective_action }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                             {{ $intr->action_number }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                             {{ $intr->implementation }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                               {{ $intr->planned }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                             {{ $intr->actual }}
                                            </div>
                                        </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <br><br>
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="form-group row w-100 text-right">
                        <div class="col-10">
                            <label class="col-2 col-form-label"> رئيس فريق المراجعه :</label>
                            {{ $interior->head_of_the_review }}
                        </div>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <div class="col-4">                            
                        <label for="" class="col-1 col-form-label"> الاسم :</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $interior->name }}
                        </div>
                        <div class="col-4">
                            <label for="" class="col-1 col-form-label"> التاريخ :</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $interior->date }}
                        </div>
                    </div>
                @endif
                <br><br>
                <table class="table table-bordered">
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
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA –
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

@stop
