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
                    maxlength="1024" placeholder="" rows="6"></textarea>
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
                    maxlength="60" placeholder="" rows="6"></textarea>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-2">
            <div class="fv-row mb-7">
                <label class="required fw-bold fs-6 mb-2">Category</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="fv-row mb-7">
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Contact Code" data-allow-clear="true"
                    data-dropdown-parent="#right_modal">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <p
                style="margin: 0 0 10px;padding: 10px 0px 10px 10px;background-color: #eee;font-weight: 500;border-radius:8px;">
                <span style="color:initial;"><b>Notes:</b><br>1) Allowed only 1024 characters.<br>
                    2) Use parameters like {{ 1 }},{{ 2 }}.<br>
                    3) Always parameters start from {{ 1 }}. You can not get any random parameters.<br>
                    4) Get parameters in numeric form which starts from {{ 1 }}.<br>
                    5) For Bold Text your message with an asterisk(*) on both sides of the text.<br>
                    6) For Italic Text your message with an underscore(_) on both sides of the text.<br>
                    7) For Struck Through Text your message with an tilde(~) on both sides of the text.<br>
                </span>
            </p>
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
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        $('.kt_docs_maxlength_textarea_1024').maxlength({
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
    });
</script>
