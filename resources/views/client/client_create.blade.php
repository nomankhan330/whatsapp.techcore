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
        <h2>Basic Information</h2>
        <hr>
        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class="required fw-bold fs-6 mb-2">Name</label>
                <input type="text" name="name"
                    value="{{ isset($client->client_name) ? $client->client_name : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Name here."
                    required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ isset($client->email) ? $client->email : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter your Email Address here." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Contact Person</label>
                <input type="text" name="contact_person"
                    value="{{ isset($client->contact_person) ? $client->contact_person : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter your Contact person here." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Contact Number</label>
                <input type="text" name="contact_no"
                    value="{{ isset($client->contact_number) ? $client->contact_number : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter your Contact number here." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Address</label>
                {{-- <input type="text" name="address" value="{{isset($client->address) ? $client->address : ''}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Please Enter your Address here."/> --}}
                <textarea name="address" class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter your Address here.">{{ isset($client->address) ? $client->address : '' }}</textarea>

            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Password</label>
                <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter your Password here." />
            </div>
        </div>


        <h2>WhatsApp Information</h2>
        <hr>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Access Token</label>
                <input type="text" name="user_access_token"
                    value="{{ isset($client->user_access_token) ? $client->user_access_token : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter User Access Token." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Whatsapp Business ID</label>
                <input type="text" name="waba_id" value="{{ isset($client->waba_id) ? $client->waba_id : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter Whatsapp Business ID." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Phone Number ID</label>
                <input type="text" name="phone_number_id"
                    value="{{ isset($client->phone_number_id) ? $client->phone_number_id : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Phone Number ID." />
            </div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-7">
                <label class=" fw-bold fs-6 mb-2">Whatsapp Number</label>
                <input type="text" name="wa_number"
                    value="{{ isset($client->wa_number) ? $client->wa_number : '' }}"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter Whatsapp Number." />
            </div>
        </div>

    </div>

</div>
<div class="text-center pt-15">

</div>
</form>
<script>
    function clientSubmit() {
        $('button[id="submitbutton"]').attr('disabled', 'disabled');
        $('.indicator-label').css('display', 'none');
        $('.indicator-progress').css('display', 'block');
        $.ajax({
            url: $("#client_from").attr('action'),
            method: 'POST',
            data: $('#client_from').serialize(),
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
                    $('#client_from').find('span').remove()

                    $.each(err.responseJSON.errors, function(i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span style="color: red;">' + error[0] + '</span>'));
                    });
                } else if (err.status == 500) {
                    alert("Something went wrong call the admin");
                }
            }
        });
    }
</script>
