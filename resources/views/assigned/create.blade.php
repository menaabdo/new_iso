@extends('layouts.master')

@section('content')

<div class='row card'>
    <div style='margin:auto'>
        <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
        <hr>
    </div>
    <div class='row '>
        <form action="{{route('assigned.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-9' style='margin:auto'>
            {{ csrf_field() }}
            <div class='shadow-lg p-3'>
                <label class="form-label pr-5">CO LOGO</label>
                <div class=''>
                    <input type="file" id="img" name="logo" accept="image/*" class='form-control'>
                </div>
            </div>
            <div class='shadow-lg mt-5 p-3'>
                <label class="form-label">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</label>
                <div>
                    <textarea name="assigned" rows="12" cols="100" class='form-control'>

       </textarea>
                </div>
            </div>
            <br>
            <table class="table">
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
                                <label>تاريخ الإصدار </label>
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
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>

        </form>

    </div>
</div>
<!-- <div class="card ">
<div class="card-body" style='margin-right:250px'>
  <h3 style="margin-top:85px;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
  <hr>
    <form action="{{route('assigned.store')}}" method="post" enctype="multipart/form-data" id="fo1">
      {{ csrf_field() }}
      <div id="mainDiv">
        <h4 style="height: 15px; color:blue;">CO LOGO</h4>
        <hr width="50%" size="20" >
        <input type="file" id="img" name="logo" accept="image/*">
      </div>
    <table>
        <tr>
            <th class="  text-center col-1 ">
                <div class="" style="text-align:center ;">
                    <h3 for="" class="" style="text-align:center; color:blue;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة:</h3>
                    <hr width="500px;" size="20" color="blue">
                </div>
            </th>
        </tr>
        <tr>
            <th class="  text-center col-1 ">
                <textarea  name="assigned" rows="12" cols="150">

                </textarea>
            </th>
        </tr>

    </table>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <div class="" style="text-align:start ;">
                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :">
              </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
    
            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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
      <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
          class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ </button>
      </div>
    </form>
</div> -->
<style>
    #mainDiv {
        height: 200px;
        width: 200px;
        background: #ffffff;
        border: 1px solid rgb(8, 2, 2);
        text-align: center;
        width: 20%;
        float: left;
        display: inline-table;
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<style>
    .table thead th {
        vertical-align: bottom;

    }

    table,
    th,
    td,
    tr {
        border: 1px solid black;

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
