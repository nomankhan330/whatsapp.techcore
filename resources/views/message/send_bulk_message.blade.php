<form id="contact_from" class="form" method="POST" action="{{--{{ route('message.create') }}--}}">
    @method('PUT')

    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
         data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
         data-kt-scroll-offset="300px">

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Official Whats App Number</label>
            <input type="text" value="{{ isset($contact->client_name) ? $contact->client_name : '919975754734' }}"
                   class="form-control form-control-solid mb-3 mb-lg-0" disabled placeholder="Please Enter your Name here."
                   required />
        </div>

        <div class="fv-row mb-7">
            <label class="fw-bold fs-6 mb-2 required">Template Name</label>
            <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                    data-kt-select2="true" data-placeholder="Select Template Name" name="template_name" id="template_name"
                    data-allow-clear="true" data-dropdown-parent="#right_modal">
                <option></option>
                <option value="calltoaction">calltoaction</option>
                <option value="bodylink">bodylink</option>
            </select>
        </div>

        <div id="divTemplatePreview" style="display: none;">

            <div class="fv-row mb-7">
                <label class="fw-bold fs-6 mb-2">Template Preview:</label>
                <div style="border: 1px solid #ccc;background-color: #eee; margin-right: -15px; padding: 10px;">

                    <b>Greetings from WebXion</b><br><br>
                    <p>Hi {{1}}<br><br>Thank you for connecting. Your Account activation has been done on date {{2}}<br></p>
                    <p style="font-size: smaller;">Regards WebXion</p><br>
                    <button type="button" class="btn btn-primary col-sm-5">Visit us</button>
                    <br><br>
                    <button type="button" class="btn btn-primary col-sm-5">Call us</button>
                    <br></div>
            </div>
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2 required">Broadcast Name</label>
            <input type="text" value="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Broadcast Name" name="broadcast" required />
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2 required">Upload Excel</label>
            <input type="file" name="file" class="form-control mb-3 mb-lg-0">
            <span><a href="{{ asset('samplesheets/sample_message_send.xlsx') }}">Click Here</a> to get sample document.</span>
        </div>

        <div class="fv-row mb-7">
            <label class="fw-bold fs-6 mb-2 required">Scheduled Message Send</label>
            <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                    data-kt-select2="true" data-placeholder="Select Scheduled Message Send" name="scheduled_message_send" id="scheduled_message_send"
                    data-allow-clear="true" data-dropdown-parent="#right_modal">
                <option></option>
                <option value="now">Now</option>
                <option value="later">Later</option>
            </select>
        </div>

        <div class="fv-row mb-7" id="divScheduled" style="display: none;">
            <label class="required fw-bold fs-6 mb-2 required">Scheduled Date & Time</label>
            <input class="form-control form-control-solid flatPicker" placeholder="Pick date & time" id="kt_datepicker_3"/>
        </div>

    </div>
    <div class="text-center pt-15">

    </div>
</form>

<script>
    $(document).ready(function() {

        $(".flatPicker").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $('.js-example-basic-single').select2();

        $("#template_name").on('change', function() {

            let val = $(this).val();
            Swal.fire({
                text: "Please used this template is approved!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });

            $("#divTemplatePreview").show()
        });

        $("#scheduled_message_send").on('change', function() {

            let val = $(this).val();

            if (val === "later"){
                $("#divScheduled").show()
            }else{
                $("#divScheduled").hide()
            }


        });
    });

    function messageSubmit() {
        $('button[id="submitbutton"]').attr('disabled', 'disabled');
        $('.indicator-label').css('display', 'none');
        $('.indicator-progress').css('display', 'block');
        $.ajax({
            url: $("#contact_from").attr('action'),
            method: 'POST',
            data: $('#contact_from').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(result) {
                dt.draw();
                toastrAll(result.status, result.message);
                $('#right_modal_close').click();
            },
            error: function(err) {
                $('button[id="submitbutton"]').removeAttr('disabled');
                $('.indicator-progress').css('display', 'none');
                $('.indicator-label').css('display', 'block');
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    $('#contact_from').find('span.yourclass').remove()

                    $.each(err.responseJSON.errors, function(i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="yourclass" style="color: red;">' + error[0] +
                            '</span>'));
                    });
                } else if (err.status == 500) {
                    alert("Something went wrong call the admin");
                }
            }
        });
    }
</script>
