@if (!isset($contact->id))
    <form id="contact_from" class="form" method="POST" action="{{ route('contact.store') }}">
    @else
        <form id="contact_from" class="form" method="POST" action="{{ route('contact.update', $contact->id) }}">
            @method('PUT')
@endif
@csrf
<div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
    data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
    data-kt-scroll-offset="300px">
    <div class="fv-row mb-7">
        <label class="required fw-bold fs-6 mb-2">Official Whats App Number</label>
        <input type="text" value="{{ $contactNo }}" class="form-control form-control-solid mb-3 mb-lg-0" disabled
            placeholder="Please Enter your Name here." required />
    </div>
    <div class="fv-row mb-7">
        <label class=" fw-bold fs-6 mb-2">Contact Full Name</label>
        <input type="text" name="contact_name"
            value="{{ isset($contact->contact_name) ? $contact->contact_name : '' }}"
            class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Name" />
    </div>

    <div class="row">

        @if (!isset($contact->contact_number))

            <div class="col-md-6">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Country Code</label>
                    <select class="form-select form-select-solid fw-bolder js-example-basic-single"
                        data-kt-select2="true" data-placeholder="Select Contact Code" name="country_code"
                        data-allow-clear="true" data-dropdown-parent="#right_modal">
                        <option></option>
                        @for ($i = 0; $i < count($countryCode); $i++)
                            <option value="{{ $countryCode[$i]->code }}">{{ $countryCode[$i]->code }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-6 mb-2">Contact Number</label>
                    <input type="text" name="contact_number"
                        value="{{ isset($contact->contact_number) ? $contact->contact_number : '' }}"
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter WhatsApp Number" />
                </div>
            </div>

        @endif
        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class="fw-bold fs-6 mb-2">Group Name</label>
                <select class="form-select form-select-solid fw-bolder js-example-basic-single" data-kt-select2="true"
                    data-placeholder="Select Group" name="contact_group_id" data-allow-clear="true"
                    data-dropdown-parent="#right_modal">
                    <option></option>
                    @for ($i = 0; $i < count($contactGroup); $i++)
                        <option value="{{ $contactGroup[$i]->id }}"
                            {{ isset($contact->contact_group_id) && $contactGroup[$i]->id == $contact->contact_group_id ? 'Selected' : '' }}>
                            {{ $contactGroup[$i]->fullname }}</option>
                    @endfor
                </select>
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
    });

    function clientSubmit() {
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
                    $('#contact_from').find('span.myClass').remove()

                    $.each(err.responseJSON.errors, function(i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        if (el[0].type == 'select-one') {
                            spanerror = $('<span class="myClass" style="color: red;">' + error[0] +
                                '</span>');
                            el[0].parentElement.children[2].after(spanerror[0])
                        } else {
                            el.after($(
                                '<span class="myClass" style="color: red;">' + error[0] +
                                '</span>'));
                        }

                    });
                } else if (err.status == 500) {
                    alert("Something went wrong call the admin");
                } else if (err.status == 401) {
                    window.location.reload();
                }
            }
        });
    }
</script>
