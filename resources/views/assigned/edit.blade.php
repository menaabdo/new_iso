@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
  <h3 style="margin-top:85px;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
  <hr>
    <form action="{{route('assigned.update',$assigned->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
        {{ csrf_field() }}
      <div id="mainDiv">
        <h4 style="height: 15px; color:blue;">CO LOGO</h4>
        <hr width="50%" size="20" color="blue">
        <img src="{{ asset($assigned->logo) }}"   height=180px  width=210px;/>
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
                    {{ $assigned->assigned }}
                </textarea>
            </th>
        </tr>

    </table>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <div class="" style="text-align:start ;">
                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $assigned->company_name }}">
              </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :"value="{{ $assigned->date2 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
    
            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" value="{{ $assigned->date3 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
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
          class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
      </div>
    </form>
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