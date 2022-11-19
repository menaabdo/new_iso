@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>

    <div class="row card" style='margin:auto;margin-top:80px' >

        <form action="{{route('sopArchives.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="1">
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>أرشيف إجراء أهداف الجودة </h2>
                <hr class="w-100">
            </div>
            <div class='row'>
                <label class="col-md-2">أسم الأرشيف</label>
                <input class="col-md-6 form-control" style="text-align: center;" type="text" name="name">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">محتوي الأرشيف</label>
                <input class="col-md-6 form-control" type="file" id="img" name="links">
            </div>
            <div class='row mt-3'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>
        </form>
    </div>

@stop
