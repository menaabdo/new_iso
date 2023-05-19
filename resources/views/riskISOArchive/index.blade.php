@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    #me:hover {
        transform: scale(1.1);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>

<section class="content" style='margin:auto;'>
    <div class="card">
        <div class="card-body row" style='margin:auto;;'>


            <h3 style="margin-top:85px;color: #2a415b;
    text-shadow: 1px 1px 1px #3ed3ea;
    font-weight: bold;">@lang('main.Archive') @lang('main.Risk assessment1') </h3>
            <hr>
        </div>
        <div class="row" style='margin:auto;width:90%'>

            <a href="{{ route('risksopArchives.create') }}" class="btn col-md-12 mr-1" style="margin-top: 40px;">
                <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>@lang('main.create')</b></button></a>
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table  table-striped shadow-lg" style=''>
                                        <thead>
                                            <tr style='background-color: #001635;color:white;text-align:center'>
                                                <th>@lang('main.Archive Name')</th>
                                                <th data-field="Actions" class="datatable-cell "><span style="">@lang('main.Actions')</span></th>
                                            </tr>
                                        </thead>
                                        <tbody class="datatable-body text-center">
                                            @foreach ($all_iso_archives as $all_iso_archive)
                                            <tr class="datatable-row datatable-row-even" style="left: 0px;">
                                                <td class="datatable-cell"><span>{{ $all_iso_archive->name }}</span>
                                                </td>
                                                <td style="font-size:15px">
                                                    <form id="delete-form-{{ $all_iso_archive->id }}" action="{{ route('risksopArchives.destroy', $all_iso_archive->id) }}" method="post">

                                                        <a href="{{ route('risksopArchives.edit', $all_iso_archive->id) }}" class="btn btn-lg  
                                        btn-icon " title="@lang('general.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-lg  btn-icon" title="@lang('general.delete')" onclick="confirmDelete('delete-form-{{ $all_iso_archive->id }}')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>


                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</section>


{{-- <div style="display: none" id="DivIdToPrint" class="DivIdPrint">
        @include('ISO.print')
    </div> --}}

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script> --}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{url('/resources/js/jquery.PrintArea.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".print").click(function() {
            var id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , url: "{{ url('sop-print') }}"
                , type: "GET"
                , data: {
                    id: id
                    , _token: '{{ csrf_token() }}'
                }
                , success: function(result) {

                    $('.DivIdPrint').html(result);

                    var mode = 'iframe'; //popup
                    var close = mode == "popup";
                    var options = {
                        mode: mode
                        , popClose: close
                    };
                    $("#DivIdToPrint").printArea(options);
                    // var divContents = document.getElementById("DivIdToPrint").innerHTML;
                    // var printWindow = window.open('http://127.0.0.1:8000',  'PRINT', '');
                    // printWindow.document.write(divContents);
                    // printWindow.focus();
                    // printWindow.print();
                    // printWindow.close();
                }
            });


        });
    });

</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    function confirmDelete(item_id) {
        Swal.fire({
            title: "Are you sure?"
            , text: `You won"t be able to revert this!`
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonText: "Yes, delete it!"
            , cancelButtonText: "No, cancel!"
            , reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $('#' + item_id).submit();
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled"
                    , "Your imaginary file is safe :)"
                    , "error"
                )
            }
        });
    }

</script>
@endsection
