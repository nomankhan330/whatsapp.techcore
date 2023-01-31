<form id="message_bulk_form" class="form" method="POST" action="{{ route('message') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
        data-kt-scroll-offset="300px">
        <input type="text" name='single_or_bulk' value="bulk" hidden />
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Official Whats App Number</label>
            <input type="text" value="{{ $whatsAppNumber }}" class="form-control form-control-solid mb-3 mb-lg-0"
                disabled placeholder="Please Enter your Name here." required />
        </div>

        <div class="fv-row mb-7">
            <label class="fw-bold fs-6 mb-2 required">Template Name</label>
            <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                data-placeholder="Select Template Name" name="template_name" id="template_name" data-allow-clear="true"
                data-dropdown-parent="#right_modal">
                <option></option>
                {{-- <option value="calltoaction">calltoaction</option>
                    <option value="bodylink">bodylink</option> --}}

                @for ($i = 0; $i < count($templates); $i++)
                    <option value="{{ $templates[$i]->id }}"> {{ $templates[$i]->template_name }} </option>
                @endfor
            </select>
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2 required">Broadcast Name</label>
            <input type="text" value="" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Enter Broadcast Name" name="broadcast" required />
        </div>

        <div id="divTemplatePreview" style="display: none;">

            <div class="fv-row mb-7">
                <label class="fw-bold fs-6 mb-2">Template Preview:</label>

                <div id="divTemplateData"
                    style="border: 1px solid #ccc;background-color: #eee; margin-right: -15px; padding: 10px;">

                    {{-- <b>Greetings from WebXion</b><br><br>
                    <p>Hi {{1}}<br><br>Thank you for connecting. Your Account activation has been done on date {{2}}<br></p>
                    <p style="font-size: smaller;">Regards WebXion</p><br>
                    <button type="button" class="btn btn-primary col-sm-5">Visit us</button>
                    <br><br>
                    <button type="button" class="btn btn-primary col-sm-5">Call us</button> --}}
                    <br>
                </div>

            </div>
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2 required">Upload Excel</label>
            <input type="file" name="file" class="form-control mb-3 mb-lg-0">
            <span><a href="{{ asset('samplesheets/sample_message_send.xlsx') }}">Click Here</a> to get sample
                document.</span>
        </div>

        <div class="fv-row mb-7">
            <label class="fw-bold fs-6 mb-2 required">Scheduled Message Send</label>
            <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                data-placeholder="Select Scheduled Message Send" name="scheduled_message_send"
                id="scheduled_message_send" data-allow-clear="true" data-dropdown-parent="#right_modal">
                <option></option>
                <option value="Now">Now</option>
                <option value="Later">Later</option>
            </select>
        </div>

        <div class="fv-row mb-7" id="divScheduled" style="display: none;">
            <label class="required fw-bold fs-6 mb-2 required">Scheduled Date & Time</label>
            <input class="form-control form-control-solid flatPicker" name="scheduled_at" placeholder="Pick date & time"
                id="kt_datepicker_3" />
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
            time_24hr: true,
            minDate: "today",
        });

        $('.js-example-basic-single').select2();

        $("#template_name").on('change', function() {

            let val = $(this).val();
            let _html = "";
            let media_url = "";

            $.ajax({
                type: 'POST',
                url: "{{ route('get_template_data') }}",
                data: {
                    'id': val
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result) {

                    console.log(result);

                    if (result.code === '200') {

                        let params = result.params;

                        result = result.data[0];
                        //console.log(result.id);

                        if (result.header_type == "media") {
                            media_url = "{{ asset(':path') }}";
                            media_url = media_url.replace(':path', result.header_value)
                            _html +=
                                `<a href="${media_url}" class="btn btn-info btn-sm">Attachment</a> <br /> <br />`;
                        }

                        _html += `<pre>${result.body_text}</pre>`
                        _html += `<pre>${result.footer_text}</pre>`

                        $("#divTemplateData").html(_html);
                        $("#divTemplatePreview").show()
                    }
                }
            });

            /*Swal.fire({
                text: "Please used this template is approved!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });*/


        });

        $("#scheduled_message_send").on('change', function() {

            let val = $(this).val();

            if (val === "Later") {
                $("#divScheduled").show()
            } else {
                $("#divScheduled").hide()
            }


        });
    });

    function messageSubmit() {

        $('button[id="submitbutton"]').attr('disabled', 'disabled');
        $('.indicator-label').css('display', 'none');
        $('.indicator-progress').css('display', 'block');

        $.ajax({
            url: $("#message_bulk_form").attr('action'),
            method: 'POST',
            data: new FormData($("#message_bulk_form")[0]),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(result) {
                toastrAll(result.status, result.message);
                $('#right_modal_close').click();
            },
            cache: false,
            contentType: false,
            processData: false

        });
    }
</script>
