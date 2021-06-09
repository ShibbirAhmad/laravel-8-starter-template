<script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });

</script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('admin/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard/dash_1.js') }}"></script>



{{-- //modal --}}

<div class="modal" id="__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="__modal__title">Modal title</h5>

            </div>

            <div class="modal-body" id="__modal_body">
                <div class="d-flex justify-content-between mx-5 mt-3 mb-5" id="modal_loading">
                    <div class="spinner-border text-success align-self-center loader-lg"></div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {


        //modal show on add view     
        $(document).find('.modal_show').on('click', function(e) {

            let $action = $(this).attr('route');
            let modal__title = $(this).attr('modal-title');
            $("#__modal__title").text(modal__title)

            $.ajax({
                url: $action,
                type: "GET",
                cache: false,
                // beforeSend: function() {
                //     $("#modal_loading").show()

                // },
                success: function(resp) {
                    $("#modal_loading").hide()
                    $(document).find('#__modal_body').html(resp.html);




                },
                error: function(e) {

                    // alert("some thing want wrong");
                }
            });
            //  console.log(action);
            $('#__modal').modal('show')

        })



        //modal show on edit view     
        $(document).find('.modal_show_edit').on('click', function(e) {

            let $action = $(this).attr('route');
            let modal__title = $(this).attr('modal-title');
            $("#__modal__title").text(modal__title)

            $.ajax({
                url: $action,
                type: "GET",
                cache: false,
                // beforeSend: function() {
                //     $("#modal_loading").show()

                // },
                success: function(resp) {
                    $("#modal_loading").hide()
                    $(document).find('#__modal_body').html(resp.html);
                },
                error: function(e) {

                    // alert("some thing want wrong");
                }
            });
            //  console.log(action);
            $('#__modal').modal('show')

        })



        //delete method     
        $(document).find('.btn_delete').on('click', function(e) {

            if (confirm('Are your sure? Delete This')) {
                let $action = $(this).attr('route');
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    url: $action,
                    type: "DELETE",
                    success: function(resp) {
                        if (resp.success == "OK") {
                            toastMessage(resp.message);
                        }
                    },
                    error: function(e) {}
                });

            }
        })




        ///form submit
        $('#__modal').on('submit', '#submit_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                // beforeSend: function () {
                //     $('.preloader').show();
                // },
                //success function
                success: function(resp) {

                    console.log(resp)
                    if (resp.success == "OK") {

                        $("#__modal").hide();
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("some thing want wrong");
                }
            });
        });



        function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                type: 'success',
                title: message
            })

            setTimeout(() => {
                location.reload();
            }, 1000);
        }

    });

</script>
