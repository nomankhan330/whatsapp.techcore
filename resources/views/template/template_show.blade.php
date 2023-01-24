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
                    <input type="text" id="template_name" name="template_name" value="{{ isset($template->template_name) ? $template->template_name : '' }}" disabled class="form-control form-control-solid mb-3 mb-lg-0"  />
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
                    <input type="text" id="template_category" name="template_category" value="{{ isset($template->templateCategory->fullname) ? $template->templateCategory->fullname : '' }}" class="form-control form-control-solid mb-3 mb-lg-0"  required />
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
                    <input type="text" id="template_language" name="template_language" value="{{ isset($template->templateLanguage->shortname) ? $template->templateLanguage->fullname." (".$template->templateLanguage->shortname.")" : '' }}" class="form-control form-control-solid mb-3 mb-lg-0"  required />
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
                    <input type="text" id="header_type" name="header_type" value="{{ isset($template->header_type) ? ucfirst($template->header_type) : '' }}" class="form-control form-control-solid mb-3 mb-lg-0"  disabled />
                </div>
            </div>

        </div>

        @if($template->header_type == 'media')
            <div class="row" id="divMedia">
                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="required fw-bold fs-6 mb-2">Media</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <a href="{{ asset($template->header_value) }}" class="btn btn-primary btn-sm"> <label class="fa fa-download">Download Attachment</label> </a>
                    </div>
                </div>
            </div>
        @endif

        @if($template->header_type == 'text')

            <div class="row" id="divText">

                <div class="col-md-2">
                    <div class="fv-row mb-7">
                        <label class="required fw-bold fs-6 mb-2">Text</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid mb-5 mb-lg-0 kt_docs_maxlength_textarea_60" disabled id="header_text" name="header_text" maxlength="60" rows="4">{{ isset($template->header_value) ? $template->header_value : '' }}</textarea>
                        <span style="color:red;">Note:Allowed only 60 characters.</span>
                    </div>
                </div>
            </div>

        @endif


        <div class="row">

            <div class="col-md-2">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2 required">Body Text</label>
                </div>
            </div>

            <div class="col-md-5">
                <div class="fv-row mb-7">
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_1024" disabled id="body_text" name="body_text" maxlength="1024" placeholder="Enter Body Text" rows="11">{{ isset($template->body_text) ? $template->body_text : '' }}</textarea>
                    <span style="color:red;">Note:Allowed only 1024 characters.</span>
                </div>
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
                    <textarea class="form-control form-control-solid mb-3 mb-lg-0 kt_docs_maxlength_textarea_60" disabled id="footer_text" name="footer_text" maxlength="60" placeholder="Enter Footer Text" rows="6">{{ isset($template->footer_text) ? $template->footer_text : '' }}</textarea>
                    <span style="color:red;">Note:Allowed only 60 characters.</span>
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
                    <input type="text" id="select_button" name="select_button" value="{{ isset($template->button_type) ? str_replace('_',' ',ucwords($template->button_type)) : '' }}" class="form-control form-control-solid mb-3 mb-lg-0"  disabled />
                </div>
            </div>

        </div>

        @if($template->button_type == "call_to_action")

            <div id="divCallToAction">

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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" disabled id="website_button_text" name="website_button_text" maxlength="20" placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->website_button_text) ? $template->button_value->website_button_text : '' }}</textarea>
                            <span style="color:red;">Note:Allowed only 20 characters.</span>
                        </div>
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
                            <input type="text" id="website_button_type" name="website_button_type" value="{{ isset($template->button_value->website_type) ? $template->button_value->website_type : '' }}" class="form-control form-control-solid mb-3 mb-lg-0"  disabled />

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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" disabled id="link" name="website_link" maxlength="2000" placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->website_link) ? $template->button_value->website_link : '' }}</textarea>
                            <span style="color:red;">Note:Allowed only 2000 characters.</span>
                        </div>
                    </div>

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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" disabled id="phone_button_text" name="phone_button_text" maxlength="20" placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->phone_button_text) ? $template->button_value->phone_button_text : '' }}</textarea>
                            <span style="color:red;">Note:Allowed only 20 characters.</span>
                        </div>
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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" disabled id="phone_phone_number" name="phone_phone_number" maxlength="20" placeholder="Enter Phone number with country code" rows="4">{{ isset($template->button_value->phone_phone_number) ? $template->button_value->phone_phone_number : '' }}</textarea>
                            <span style="color:red;">Note:Allowed only 20 characters.</span>
                        </div>
                    </div>

                </div>

            </div>
        @endif

        @if($template->button_type == "quick_reply")
            <div id="divQuickReply">

                <div class="row">

                    <div class="col-md-2">
                        <div class="fv-row mb-7">
                            <label class="fw-bold fs-6 mb-2">Button Text 1</label>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="fv-row mb-7">
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="quick_reply_button_text_1" name="quick_reply_button_text_1" maxlength="20" disabled placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->quick_reply_button_text_1) ? $template->button_value->quick_reply_button_text_1 : '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <span style="color:red;">Note:Allowed only 20 characters.</span>
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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="quick_reply_button_text_2" name="quick_reply_button_text_2" maxlength="20" disabled placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->quick_reply_button_text_2) ? $template->button_value->quick_reply_button_text_2 : '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <span style="color:red;">Note:Allowed only 20 characters.</span>
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
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="quick_reply_button_text_3" name="quick_reply_button_text_3" maxlength="20" disabled placeholder="Enter Button Text" rows="4">{{ isset($template->button_value->quick_reply_button_text_3) ? $template->button_value->quick_reply_button_text_3 : '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <span style="color:red;">Note:Allowed only 20 characters.</span>
                    </div>

                </div>

            </div>
        @endif

        <div class="text-center pt-15">

        </div>
</form>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    });

</script>
