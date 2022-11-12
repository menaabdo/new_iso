@extends('layouts.master')
@section('content')
<div class='card'>
<div class="row card-body" style='margin:auto' >
<div class='row' style='margin:auto'>
  <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
  <hr>
  </div>
 
    <form action="{{route('assigned.update',$assigned->id)}}" class='col-md-9' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
        {{ csrf_field() }}
        <div class='row shadow-lg p-3'>
      <label class=" form-label text-left pr-5" style='text-align:left !important'>CO LOGO</label>
      <div class='mx-4'>
        <input type="file" id="img" name="logo" class='form-control ' accept="image/*">
       </div>
       <img src="{{ asset($assigned->logo) }}"   height=100px  width=100px;/>
       
      </div>

      <div class='shadow-lg mt-5 p-3'>
      <label class="form-label">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</label>
      <div >
      <textarea  name="assigned" rows="12" cols="100" class='form-control'>
 
       </textarea>
</div>
     </div>
     <div class='row '>
     <table class="table table-bordered col-md-12 my-4" style='margin:auto;background-color:white'>
     <thead>
          <tr>
            <th>
              <div class="" style="text-align:start ;">
              <label>اسم الشركة</label>
                <input class="form-control shadow-lg" type="text" name="company_name" >
              </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
              <label>تاريخ الاصدار</label>
                <input class="form-control shadow-lg" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
    
            </th>
            <th>
                <div class="" style="text-align:start ;">
                <label>تاريخ التعديل</label>
                    <input class="form-control shadow-lg" type="text" name="date3"  onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
                    <label for="" class="" style="text-align: center;"> مدة الحفظ:
                        سنتان </label>
              </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
                <label for="" class="" style="text-align: center;"> رقم الصفحة: 1 /
                  1</label>
              </div>
            </th>
            <th>
              <div class="" style="text-align:start ;">
                <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
                  - 13 </label>
              </div>
            </th>
         </tr>
         </thead>
         
      </table>
                    </div>
                    <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                    </div>      
      
    </form>
    </div>
</div>
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
</style>

@stop