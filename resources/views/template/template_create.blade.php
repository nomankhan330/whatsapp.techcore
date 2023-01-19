@if (!isset($client->id))
    <form id="client_from" class="form" method="POST" action="{{ route('client.store') }}">
    @else
        <form id="client_from" class="form" method="POST" action="{{ route('client.update', $client->id) }}">
            @method('PUT')
            <input hidden name="user_id" value="{{ $client->user->id }}" />
@endif
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
                <input type="text" name="name"
                    value="{{ isset($client->client_name) ? $client->client_name : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Template Name" required />

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
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Category" data-allow-clear="true" data-dropdown-parent="#right_modal">
                    <option></option>
                    <option value="Auto Reply">Auto Reply</option>
                    <option value="Account Update">Account Update</option>
                    <option value="Payment Update">Payment Update</option>
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
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Language" data-allow-clear="true" data-dropdown-parent="#right_modal">
                    <option></option>
                    <option value="en_US">English (US) (en_US)</option>
                    <option value="en_GB">English (UK) (en_GB)</option>
                    <option value="en">English (en)</option>
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
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Header" data-allow-clear="true" data-dropdown-parent="#right_modal"
                    id="ddlHeader">
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
                <input type="file" name="file" class="form-control mb-3 mb-lg-0">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_60" id=""
                          maxlength="60" placeholder="Enter Header Text" rows="4"></textarea>
            </div>
        </div>
        <div class="col-md-5">
            <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                    maxlength="1024" placeholder="Enter Body Text" rows="11"></textarea>
            </div>
        </div>

        <div class="col-md-5">
            <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px;background-color: #eee;font-weight: 500;border-radius:8px;">
                <span style="color:initial;"><b>Notes:</b><br>1) Allowed only 1024 characters.<br>
                    2) Use parameters like @{{1}},@{{2}}.<br>
                    3) Always parameters start from @{{1}}. You can not get any random parameters.<br>
                    4) Get parameters in numeric form which starts from @{{1}}.<br>
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
                          maxlength="60" placeholder="Enter Footer Text" rows="6"></textarea>
            </div>
        </div>

        <div class="col-md-5">
            <div class="fv-row mb-7">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Button" data-allow-clear="true"
                    data-dropdown-parent="#right_modal" id="select_button">
                    <option></option>
                    <option value="call_to_action">Call To Action</option>
                    <option value="quick_reply">Quick Reply</option>
                </select>
            </div>
        </div>

    </div>

    <div id="divCallToAction" style="display: none;">

        {{--Visit Website--}}
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                            data-placeholder="Select Type" data-allow-clear="true"
                            data-dropdown-parent="#right_modal" id="call_to_action_type">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="2000" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                <span style="color:initial;">
                    <b>Notes:</b><br>
                    Allowed only 2000 characters.
                </span>
                </p>
            </div>

        </div>

        {{--Call Phone--}}
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Phone number with country code" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
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
                <textarea class="form-control form-control-solid mb-3 mb-lg-0" id=""
                          maxlength="20" placeholder="Enter Button Text" rows="4"></textarea>
                </div>
            </div>

            <div class="col-md-5">
                <p style="margin: 0 0 10px;padding: 10px 0px 10px 10px; background-color: #eee;font-weight: 500;border-radius:8px;">
                <span style="color:initial;">
                    <b>Notes:</b><br>
                    Allowed only 20 characters.
                </span>
                </p>
            </div>

        </div>

    </div>

</div>

<div class="text-center pt-15">

</div>
</form>

<script>
    $(document).ready(function() {

        $('.js-example-basic-single').select2();

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


        $("#ddlHeader").on('change', function() {
            let val = $(this).val();
            if (val === 'media') {
                $("#divMedia").show()
                $("#divText").hide()
            } else if (val === 'text') {
                $("#divMedia").hide()
                $("#divText").show()
            } else {
                $("#divMedia").hide()
                $("#divText").hide()
            }
        });

        $("#select_button").on('change', function() {

            let val = $(this).val();

            if (val === 'call_to_action') {
                $("#divCallToAction").show()
                $("#divQuickReply").hide()
            } else if (val === 'quick_reply') {
                $("#divCallToAction").hide()
                $("#divQuickReply").show()
            } else {
                $("#divCallToAction").hide()
                $("#divQuickReply").hide()
            }
        });

    });
</script>
