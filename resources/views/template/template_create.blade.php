<form id="template_form" class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
        data-kt-scroll-offset="300px">

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="required fw-bold fs-6 mb-2">Template Name</label>
                </div>
            </div>

            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <input type="text" id="template_name" name="template_name" value=""
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Template Name"
                        required />
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="required fw-bold fs-6 mb-2">Category</label>
                </div>
            </div>

            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Category" name="template_category"
                        data-allow-clear="true" data-dropdown-parent="#right_modal">
                        <option></option>

                        @for ($i = 0; $i < count($templateCategory); $i++)
                            <option value="{{ $templateCategory[$i]->id }}">{{ $templateCategory[$i]->fullname }}
                            </option>
                        @endfor

                        {{-- <option value="Auto Reply">Auto Reply</option>
                    <option value="Account Update">Account Update</option>
                    <option value="Payment Update">Payment Update</option> --}}
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="required fw-bold fs-6 mb-2">Language</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Language" name="template_language"
                        data-allow-clear="true" data-dropdown-parent="#right_modal">
                        <option></option>

                        @for ($i = 0; $i < count($templateLanguage); $i++)
                            <option value="{{ $templateLanguage[$i]->id }}">{{ $templateLanguage[$i]->fullname }}
                                ({{ $templateLanguage[$i]->shortname }})</option>
                        @endfor

                        {{-- <option value="en_US">English (US) (en_US)</option>
                    <option value="en_GB">English (UK) (en_GB)</option>
                    <option value="en">English (en)</option> --}}
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Header</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Header" data-allow-clear="true"
                        data-dropdown-parent="#right_modal" name="header_type" id="header_type">
                        <option value="none">None</option>
                        <option value="media">Media</option>
                        <option value="text">Text</option>
                    </select>
                </div>
            </div>

        </div>


        <div class="row" id="divMedia" style="display: none;">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="required fw-bold fs-6 mb-2">Media</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <input type="file" name="header_file" class="form-control mb-3 mb-lg-0">
                </div>
            </div>

        </div>

        <div class="row" id="divText" style="display: none;">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="required fw-bold fs-6 mb-2">Text</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_60" id="header_text"
                        name="header_text" maxlength="60" placeholder="Enter Header Text" rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-5">
                <p
                    style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                    <span style="color:initial;">
                        <b>Notes:</b><br>
                        1) Allowed only 60 characters.<br>
                        2) The message header can't have any newlines, formatting characters, emojis, or asterisks.
                    </span>
                </p>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2"></label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <button type="button" class="btn btn-success btn-sm" id="btnAddVariables">Add Variables</button>
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2 required">Body Text</label>
                </div>
            </div>

            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_1024" id="body_text"
                        name="body_text" maxlength="1024" placeholder="Enter Body Text" rows="11" onkeyup="textBodyTemplate()"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p
                    style="margin: 0 0 10px;padding: 10px 0px 10px 10px;background-color: #eee;font-weight: 500;border-radius:8px;">
                    <span style="color:initial;"><b>Notes:</b><br>1) Allowed only 1024 characters.<br>
                        2) Use parameters like @{{ 1 }},@{{ 2 }}.<br>
                        3) Always parameters start from @{{ 1 }}. You can not get any random
                        parameters.<br>
                        4) Get parameters in numeric form which starts from @{{ 1 }}.<br>
                        5) For Bold Text your message with an asterisk(*) on both sides of the text.<br>
                        6) For Italic Text your message with an underscore(_) on both sides of the text.<br>
                        7) For Struck Through Text your message with an tilde(~) on both sides of the text.<br>
                    </span>
                </p>
            </div>

        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Footer Text</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_60" id="footer_text"
                        name="footer_text" maxlength="60" placeholder="Enter Footer Text" rows="6"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            1) Allowed only 60 characters.<br>
                            2) The message footer can't have any newlines or emojis.<br>
                        </span>
                    </p>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Button</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Button" data-allow-clear="true"
                        data-dropdown-parent="#right_modal" id="select_button" name="select_button">
                        <option></option>
                        <option value="call_to_action">Call To Action</option>
                        <option value="quick_reply">Quick Reply</option>
                    </select>
                </div>
            </div>

        </div>

        <div id="divCallToAction" style="display: none;">

            {{-- Visit Website --}}
            <div class="row">
                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2"></label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <h4>Visit Website</h4>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Button Text</label>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_20" id="website_button_text"
                            name="website_button_text" maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Type</label>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                            data-kt-select2="true" data-placeholder="Select Type" data-allow-clear="true"
                            data-dropdown-parent="#right_modal" id="call_to_action_type" name="website_type">
                            <option></option>
                            <option value="static">Static</option>
                            <option value="dynamic">Dynamic</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Link</label>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_2000" id="website_link"
                            name="website_link" maxlength="2000" placeholder="Enter Button Text" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 2000 characters.
                        </span>
                    </p>
                </div>

            </div>

            {{-- Call Phone --}}
            <div class="row">
                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2"></label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <h4>Call Phone</h4>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Button Text</label>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_2000" id="phone_button_text"
                            name="phone_button_text" maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Phone Number</label>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_2000" id="phone_phone_number"
                            name="phone_phone_number" maxlength="20" placeholder="Enter Phone number with country code" rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

        </div>

        <div id="divQuickReply" style="display: none;">

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Button Text 1</label>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_20"
                            id="quick_reply_button_text_1" name="quick_reply_button_text_1" maxlength="20" placeholder="Enter Button Text"
                            rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Button Text 2</label>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_20"
                            id="quick_reply_button_text_2" name="quick_reply_button_text_2" maxlength="20" placeholder="Enter Button Text"
                            rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Button Text 3</label>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_20"
                            id="quick_reply_button_text_3" name="quick_reply_button_text_3" maxlength="20" placeholder="Enter Button Text"
                            rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <p
                        style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                        <span style="color:initial;">
                            <b>Notes:</b><br>
                            Allowed only 20 characters.
                        </span>
                    </p>
                </div>

            </div>

        </div>

    </div>
    <div id="divTemplateData"
        style="border: 1px solid #ccc;background-color: #eee; padding-top: 8px; padding-left: 8px;font-size: 20px;">
        <pre id="divTemplateDataHeader"> </pre>
        <pre id="divTemplateDataBody"> </pre>
        <pre id="divTemplateDataFooter"></pre>
        <div id="divTemplateDataQuickReplyButton1" class="mb-2"> </div>
        <div id="divTemplateDataQuickReplyButton2" class="mb-2"> </div>
        <div id="divTemplateDataQuickReplyButton3" class="mb-2"> </div>
        <div id="divTemplateDataCallToActionButton1" class="mb-2"> </div>
        <div id="divTemplateDataCallToActionButton2" class="mb-2"> </div>
        <pre></pre>

        {{-- <a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">web button text</a> <br> <br>
        <a href="javascript:;" class="btn btn-primary btn-sm col-sm-3">call button text</a> <br> <br> --}}
    </div>
    <div class="text-center pt-15">

    </div>
</form>

<script>
    function textBodyTemplate() {
        $('#divTemplateDataBody').html($("#body_text").val());
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        $('.js-example-basic-single').select2();

        $('.kt_docs_maxlength_textarea_20').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        $('.kt_docs_maxlength_textarea_60').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        $('.kt_docs_maxlength_textarea_1024').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        $('.kt_docs_maxlength_textarea_2000').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        $("#btnAddVariables").on('click', function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('template_variable') }}",
                success: function(result) {
                    $('#myModalMdHeading').html('View Variables');
                    $('#modalBodyMedium').html(result);
                    $('#myModalMd').modal('show');
                }
            });

        });
        $("#header_text").keyup(function(e) {
            $('#divTemplateDataHeader').html(e.target.value);
        });

        $("#footer_text").keyup(function(e) {
            $('#divTemplateDataFooter').html(e.target.value);
        });

        $("#quick_reply_button_text_1").keyup(function(e) {
            let variable = `<a href = "javascript:;"
            class = "btn btn-primary btn-sm " >${e.target.value} </a>`;
            variable = e.target.value == '' ? '' : variable;
            $('#divTemplateDataQuickReplyButton1').html(variable);
        });
        $("#quick_reply_button_text_2").keyup(function(e) {
            let variable = `<a href = "javascript:;"
            class = "btn btn-primary btn-sm " >${e.target.value} </a>`;
            variable = e.target.value == '' ? '' : variable;
            $('#divTemplateDataQuickReplyButton2').html(variable);
        });
        $("#quick_reply_button_text_3").keyup(function(e) {
            let variable = `<a href = "javascript:;"
            class = "btn btn-primary btn-sm " >${e.target.value} </a>`;
            variable = e.target.value == '' ? '' : variable;
            $('#divTemplateDataQuickReplyButton3').html(variable);
        });
        $("#website_button_text").keyup(function(e) {
            let variable = `<a href = "${$(website_link).val()}"
            class = "btn btn-primary btn-sm " >${e.target.value} </a>`;
            variable = e.target.value == '' ? '' : variable;
            $('#divTemplateDataCallToActionButton1').html(variable);
        });
        $("#website_link").keyup(function(e) {
            let variable = `<a href = "${e.target.value}"
            class = "btn btn-primary btn-sm " >${$(website_button_text).val()} </a>`;
            $('#divTemplateDataCallToActionButton1').html(variable);
        });
        $("#phone_button_text").keyup(function(e) {
            let variable = `<a href = "${$(phone_phone_number).val()}"
            class = "btn btn-primary btn-sm " >${e.target.value} </a>`;
            variable = e.target.value == '' ? '' : variable;
            $('#divTemplateDataCallToActionButton2').html(variable);
        });
        $("#phone_phone_number").keyup(function(e) {
            let variable = `<a href = "${e.target.value}"
            class = "btn btn-primary btn-sm " >${$(phone_button_text).val()} </a>`;
            $('#divTemplateDataCallToActionButton2').html(variable);
        });





        $("#header_type").on('change', function() {
            let val = $(this).val();
            if (val === 'media') {
                $("#divMedia").show()
                $("#divText").hide()
                $("#divTemplateDataHeader").html(``);
                variable = `<a href="" class="btn btn-info btn-sm">Attachment</a>`;
                $("#divTemplateDataHeader").html(variable)
            } else if (val === 'text') {
                $("#divMedia").hide()
                $("#divText").show()
                $("#divTemplateDataHeader").html(``);
                $('#divTemplateDataHeader').html($('#header_text').val());
            } else {
                $("#divTemplateDataHeader").html(``);
                $("#divMedia").hide()
                $("#divText").hide()
            }
        });

        $("#select_button").on('change', function() {

            let val = $(this).val();

            if (val === 'call_to_action') {
                $("#divCallToAction").show()
                $("#divQuickReply").hide()
                $('#divTemplateDataQuickReplyButton1').html('');
                $('#divTemplateDataQuickReplyButton2').html('');
                $('#divTemplateDataQuickReplyButton3').html('');
                $('#website_button_text').val('');
                $('#phone_button_text').val('');
                $('#website_link').val('');
                $('#phone_phone_number').val('');
            } else if (val === 'quick_reply') {
                $("#divCallToAction").hide()
                $("#divQuickReply").show()
                $('#quick_reply_button_text_1').val('');
                $('#quick_reply_button_text_2').val('');
                $('#quick_reply_button_text_3').val('');
                $('#divTemplateDataCallToActionButton1').html('');
                $('#divTemplateDataCallToActionButton2').html('');
            } else {
                $('#divTemplateDataQuickReplyButton1').html('');
                $('#divTemplateDataQuickReplyButton2').html('');
                $('#divTemplateDataQuickReplyButton3').html('');
                $('#divTemplateDataCallToActionButton1').html('');
                $('#divTemplateDataCallToActionButton2').html('');
                $("#divCallToAction").hide();
                $("#divQuickReply").hide();
                $('#website_link').val('');
                $('#phone_phone_number').val('');
                $('#quick_reply_button_text_1').val('');
                $('#quick_reply_button_text_2').val('');
                $('#quick_reply_button_text_3').val('');
            }
        });
    });

    function submitTemplate() {

        let Form_data = new FormData($('#template_form')[0]);
        /*for (var pair of Form_data.entries()){
            console.log(pair[0] + ' - ' + pair[1]);
        }
        return false;*/

        $('button[id="submitbutton"]').attr('disabled', 'disabled');
        $('.indicator-label').css('display', 'none');
        $('.indicator-progress').css('display', 'block');

        $.ajax({
            method: 'POST',
            url: "{{ route('template.store') }}",
            data: Form_data,
            contentType: false,
            processData: false,
            success: (result) => {
                dt.draw();
                toastrAll(result.status, result.message);
                $('#right_modal_close').click();
            },
            /*error: function (err) {

                $('button[id="btnSave"]').removeAttr('disabled');
                $('.indicator-progress').css('display', 'none');
                $('.indicator-label').css('display', 'block');

                if (err.status == 422) { // when status code is 422, it's a validation issue
                    $('#template_form').find('span.yourclass').remove()
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="yourclass" style="color: red;">' + error[0] +
                            '</span>'));
                    });
                } else if (err.status == 500) {
                    alert("Something went wrong call the admin");
                }

            }*/
        });
    }
</script>
