@extends('layouts.Crud_Lyout')

@section('title')
    Partner-Page
@endsection
@section('main')
    <div class="container mt-4">
        <div class="container">
            <input type="search" name="" id="" class="" style="width:80vh; height:5vh;"
                placeholder="Search here....">
                <button type="button" class="btn btn-success btn-sm f-right p-2 float-end" data-bs-toggle="modal"
                data-bs-target="#createPartnerModal">
                Add Partner<i class="bi bi-person-plus-fill"></i>
            </button>
        </div>

        <h4 id="done" class="text-success text-center"></h4>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tBody"></tbody>
            </table>
        </div>
    </div>


    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="createPartnerModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId" style="transition: 3s all">
                        Add-Partners...

                    </h5>
                    <button type="button" class="btn-close btn-danger " id="closebtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" enctype="multipart/form-data" id="addPartnerForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control name" name="name"/>
                            <small class="text-danger name-error"></small>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" />
                            <small class="text-danger email-error"></small>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="phone" class="form-control" name="phone"
                                class="@error('phone') is-invalid @enderror"  id="phone"/>
                            <small class="text-danger phone-error"></small>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" name="image" id="image" id="image"/>
                            <small class="text-danger image-error"></small>
                        </div>
                        <div class="container"></div>
                        <button type="reset" class="btn btn-danger  m-2 float-end">Reset</button>
                        <button type="submit" class="btn btn-primary  m-2 float-end">Add-Partner</button>

                    </form>

                </div>
                <div class="modal-fotoor text-center">
                    <small style="color: gray">Thank you for join Oue Cummunity <i class="bi bi-heart-fill"></i></small>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->
@endsection
@pushOnce('scripts')
    <script>

        // function loadData(value = null) {
        //     $.ajax({
        //         url: '/partnerindex',
        //         type: 'GET',
        //         data: {
        //             search: value
        //         },
        //         success: function(result) {
        //             $('#tBody').html('');
        //             $.each(result, function(key, value) {
        //                 $('#tBody').append(
        //                     '<tr>' +
        //                     '<td>' + value.name + '</td>' +
        //                     '<td>' + value.email + '</td>' +
        //                     '<td>' + value.phone + '</td>' +
        //                     '<td><img src="' + value.image +
        //                     '" height="50" width="50" alt="No Image"></td>' +
        //                     '<td class="text-center">' +
        //                     '<button class="btn btn-success m-1" id="editPartnerBtn" data-id="' +
        //                     value.id + '"> Edit </button>' +
        //                     '<button class="btn btn-danger m-1" id="deletePartnerBtn" data-id="' +
        //                     value.id + '"> Delete </button>' +
        //                     '</td>' +
        //                     '</tr>'
        //                 );
        //             });
        //         }
        //     })
        // }
        // loadData();
        $('#addPartnerForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/storpartner',
                type: 'post',
                // data: $(this).serialize(),
                data: new FormData($('#addPartnerForm')[0]),
                processData: false,
                contentType: false,
                success: function(result) {
                    // loadData()
                    $('#createPartnerModal').modal('hide')
                    $('#done').html('Successfully <i class="bi bi-check2-square"></i>').slidDown(
                    'slow');

                },
                error: function(error) {
                    $('.name-error').text(error.responseJSON.errors.name[0])
                    $('.email-error').text(error.responseJSON.errors.email[0])
                    $('.phone-error').text(error.responseJSON.errors.phone[0])
                    $('.image-error').text(error.responseJSON.errors.image[0])
                }
            })
        })

        $('#closebtn').click(function (){
                var value = $(".name").val('');
                var value = $(".email").val('');
                var value = $(".phone").val('');
                 value='';
        })
















        $('document').ready(function() {
            $('#closebtn').click(function() {
                $('#done').html('');
            })

        });
    </script>
@endPushOnce
