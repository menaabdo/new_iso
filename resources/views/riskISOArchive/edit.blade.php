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

<div class="card-body row" style='margin:auto;margin-top:60px'>

    <form action="" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="1">
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>أرشيف إجراء تقيم المخاطر </h2>
            <hr class="w-100">
        </div>
        <div class='row'>
            <label class="col-md-2">@lang('main.Archive Name')</label>
            <input class="col-md-6 form-control" style="text-align: center;" type="text" name="name" value="{{ $archive->name }}">
        </div>
        <div class='row mt-4 mb-3'>
            <label class="form-label col-md-2 ">@lang('main.Archive Details')</label>
            <embed src="{{ $archive->links }}" type="application/pdf" id="src_render" frameBorder="2" scrolling="auto" height="600px" width="100%"></embed>
        </div>
        <br>
        <div class='row mt-3'>
            <button type="button" style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" id="btn" class="btn btn-primary col-md-4">
                <i class="fas fa-arrow-left" style="width:15% ; height: 20%;"></i>@lang('main.back')</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    document.getElementById("btn").onclick = function() {
        location.href = "{{ route('risksopArchives.index') }}";
    };

</script>


@endsection
