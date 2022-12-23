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
    font-weight: bold;">جميع الإجراءات</h3>
            <hr>
        </div>
        <div class="row" style='margin:auto;width:90%'>

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
                                                <th>Sop Name</th>
                                                <th>Sop Type</th>
                                                <th data-field="Actions" class="datatable-cell "><span style="">Actions</span></th>

                                            </tr>
                                        </thead>

                                        <tbody class="datatable-body text-center">
                                            @foreach ($all_iso as $iso)
                                            <tr class="datatable-row datatable-row-even" style="left: 0px;">
                                                <td class="datatable-cell"><span>{{ $iso->manage_name }}</span></td>
                                                <td class="datatable-cell"><span>{{getTypeSop($iso->type)}}</span></td>
                                                <td>
                                                    <a href="{{ route('all_sop.show', $iso->id) }}" class="btn btn-lg btn-clean
                                            btn-icon mr-2" title="@lang('general.show')">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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
                , url: "{{ url('all_sop-print') }}"
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
<script>
    $(".test").on('click', function(e) {
        window.open(''.e.target.href.
            '', "_blank");

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
