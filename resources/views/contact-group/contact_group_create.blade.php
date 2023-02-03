@if (!isset($contactGroup->id))
    <form id="contact_group_from" class="form" method="POST" action="{{ route('contact_group.store') }}">
    @else
        <form id="contact_group_from" class="form" method="POST"
            action="{{ route('contact_group.update', $contactGroup->id) }}">
            @method('PUT')
@endif
@csrf
<div class="row">
    <div class="col-md-12">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Group name</label>
            <input type="text" name="fullname"
                value="{{ isset($contactGroup->fullname) ? $contactGroup->fullname : '' }}"
                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Region Name here."
                required />
        </div>
    </div>
    <div class="col-md-12">
        <div class="fv-row mb-7">
            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                <label class="form-check-label fw-bold required fs-6 mb-2" style="margin: 10px;"
                    for="kt_flexSwitchCustomDefault_1_1">
                    Is Active
                </label>
                <input class="form-check-input" name="is_active" type="checkbox" value="1"
                    {{ isset($contactGroup->group_status) ? '' : 'checked' }}
                    {{ isset($contactGroup->group_status) && $contactGroup->group_status == '1' ? 'checked' : '' }}
                    id="kt_flexSwitchCustomDefault_1_1" />

            </div>

        </div>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    function groupSubmit() {
        $('button[id="submitbutton"]').attr('disabled', 'disabled');
        $('.indicator-label').css('display', 'none');
        $('.indicator-progress').css('display', 'block');
        $.ajax({
            url: $("#contact_group_from").attr('action'),
            method: 'POST',
            data: $('#contact_group_from').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(result) {
                dt.draw();
                toastrAll(result.status, result.message);
                $('#right_modal_close').click();
            },

        });
    }
</script>
