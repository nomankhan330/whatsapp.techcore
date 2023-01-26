    <form id="message_form" class="form" method="POST" action="{{ route('message') }}">
        @csrf
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
             data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
             data-kt-scroll-offset="300px">

            <div class="fv-row mb-7">
                <label class="required fw-bold fs-6 mb-2">Official Whats App Number</label>
                <input type="text" value="{{ $whatsAppNumber }}"
                       class="form-control form-control-solid mb-3 mb-lg-0" disabled placeholder="Please Enter your Name here."
                       required />
            </div>

            <div class="fv-row mb-7">
                <label class="fw-bold fs-6 mb-2 required">Sender Contact Number</label>
                <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Contact Number" id="contact_number" name="contact_number"
                        data-allow-clear="true" data-dropdown-parent="#right_modal">
                    <option></option>
                    {{--<option value="971545676796">Ahmed Traboli (971545676796)</option>
                    <option value="917895875567">Akshay (917895875567)</option>--}}

                    @for ($i = 0; $i < count($contact); $i++)
                        <option value="{{ $contact[$i]->contact_number }}"> {{ $contact[$i]->contact_name }} ({{ $contact[$i]->contact_number }}) </option>
                    @endfor

                </select>
            </div>

            <div class="fv-row mb-7">
                <label class="fw-bold fs-6 mb-2 required">Template Name</label>
                <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Template Name" id="template_name" name="template_name"
                        data-allow-clear="true" data-dropdown-parent="#right_modal">
                    <option></option>
                    {{--<option value="calltoaction">calltoaction</option>
                    <option value="bodylink">bodylink</option>--}}

                    @for ($i = 0; $i < count($templates); $i++)
                        <option value="{{ $templates[$i]->id }}"> {{ $templates[$i]->template_name }} </option>
                    @endfor

                </select>
            </div>

            <div class="fv-row mb-7">
                <label class="required fw-bold fs-6 mb-2 required">Broadcast Name</label>
                <input type="text" value="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Broadcast Name" id="broadcast_name" name="broadcast_name" required />
            </div>

            <div id="divTemplatePreview" style="display: none;">

                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Template Preview:</label>

                    <div id="divTemplateData" style="border: 1px solid #ccc;background-color: #eee; margin-right: -15px; padding: 10px;">

                        {{--<b>Greetings from WebXion</b><br><br>
                        <p>Hi {{1}}<br><br>Thank you for connecting. Your Account activation has been done on date {{2}}<br></p>
                        <p style="font-size: smaller;">Regards WebXion</p><br>
                        <button type="button" class="btn btn-primary col-sm-5">Visit us</button>
                        <br><br>
                        <button type="button" class="btn btn-primary col-sm-5">Call us</button>--}}
                        <br>
                    </div>

                </div>
            </div>

            <h3 class="text-center" style="display:none;" id="divParametersHeading">Custom Parameters</h3>
            <div id="divParameters"></div>
            <div id="divMediaURL"></div>

            <div class="fv-row mb-7" id="cloneDiv" style="display: none">
                <label class="required fw-bold fs-6 mb-2 required">Parameter Name @{{::count}}</label>
                <input type="text" value="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Value" name="param_" required />
            </div>


        </div>
        <div class="text-center pt-15">

        </div>
    </form>

    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2();

            $("#template_name").on('change', function() {

                let val = $(this).val();
                let _html = "";
                let media_url = "";

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get_template_data') }}",
                    data: { 'id' : val },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (result) {

                        console.log(result);

                        if (result.code === '200') {

                            let params = result.params;

                            result = result.data[0];
                            //console.log(result.id);

                            if (result.header_type == "media"){
                                media_url = "{{ asset(':path') }}";
                                media_url = media_url.replace(':path',result.header_value)
                                _html += `<a href="${media_url}" class="btn btn-info btn-sm">Attachment</a> <br /> <br />`;
                            }

                            _html += `<pre>${result.body_text}</pre>`
                            _html += `<pre>${result.footer_text}</pre>`

                            if (result.button_type == "quick_reply"){
                                if (result.button_value.quick_reply_button_text_1 != ""){
                                    _html += `<a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">${result.button_value.quick_reply_button_text_1}</a> <br /> <br />`;
                                }
                                if (result.button_value.quick_reply_button_text_2 != ""){
                                    _html += `<a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">${result.button_value.quick_reply_button_text_2}</a> <br /> <br />`;
                                }
                                if (result.button_value.quick_reply_button_text_3 != ""){
                                    _html += `<a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">${result.button_value.quick_reply_button_text_3}</a> <br /> <br />`;
                                }
                            }

                            if (result.button_type == "call_to_action"){
                                if (result.button_value.website_button_text != ""){
                                    _html += `<a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">${result.button_value.website_button_text}</a> <br /> <br />`;
                                }
                                if (result.button_value.phone_button_text != ""){
                                    _html += `<a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">${result.button_value.phone_button_text}</a> <br /> <br />`;
                                }
                            }

                            if(params.length > 0){

                                $("#divParametersHeading").show();

                                let _param_html = `<div class="fv-row mb-7" id="cloneDiv">
                                                    <label class="required fw-bold fs-6 mb-2 required">Parameter Name ::params</label>
                                                    <input type="text" id="" name=":::params" value="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Value" required />
                                                  </div>`;

                                $("#divParameters").html('');

                                let _param_replace = ""; var obj = {};

                                for (let i = 0; i < params.length; i++) {
                                    console.log(params[i]);
                                    _param_replace = _param_html.replace('::params',params[i])
                                    _param_replace = _param_replace.replace(':::params','key_'+params[i]);

                                    /*var name = params[i];
                                    var val = $("#key_"+params[i]).val();
                                    obj[name] = val;*/

                                    $("#divParameters").append(_param_replace);
                                }

                            }else{
                                $("#divParametersHeading").hide();
                                $("#divParameters").html('');
                            }

                            if(result.header_type == "media"){

                                let _media_html_link = `<div class="fv-row mb-7" id="cloneDiv">
                                                            <label class="required fw-bold fs-6 mb-2 required">Parameter Name @{{url}}</label>
                                                            <textarea class="form-control form-control-solid mb-3 mb-lg-0 required" name="media_url" placeholder="Enter Value" rowspan="2">${media_url}</textarea>
                                                          </div>`;

                                $("#divMediaURL").append(_media_html_link);
                            }else{
                                $("#divMediaURL").html('');
                            }

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
        });

        function messageSubmit() {

            $('button[id="submitbutton"]').attr('disabled', 'disabled');
            $('.indicator-label').css('display', 'none');
            $('.indicator-progress').css('display', 'block');

            $.ajax({
                url: $("#message_form").attr('action'),
                method: 'POST',
                data: $('#message_form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(result) {
                    dt.draw();
                    toastrAll(result.status, result.message);
                    $('#right_modal_close').click();
                },
                // error: function(err) {
                //     $('button[id="submitbutton"]').removeAttr('disabled');
                //     $('.indicator-progress').css('display', 'none');
                //     $('.indicator-label').css('display', 'block');
                //     if (err.status == 422) { // when status code is 422, it's a validation issue
                //         $('#contact_from').find('span.yourclass').remove()
                //
                //         $.each(err.responseJSON.errors, function(i, error) {
                //             var el = $(document).find('[name="' + i + '"]');
                //             el.after($('<span class="yourclass" style="color: red;">' + error[0] +
                //                 '</span>'));
                //         });
                //     } else if (err.status == 500) {
                //         alert("Something went wrong call the admin");
                //     }
                // }
            });
        }
    </script>
