        <form id="scheduled_update_detail" class="form" method="POST"
            action="{{ route('scheduled_detail.update', $scheduledDetail->id) }}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="fv-row mb-7">
                        <label class="required fw-bold fs-6 mb-2">Scheduled Date & Time</label>
                        <input type="text" value="{{ $scheduledDetail->scheduled_at }}"
                            class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="fv-row mb-7">
                        <label class=" fw-bold fs-6 mb-2">Rescheduled Date & Time</label>
                        <input type="text" name="scheduled_at"
                            class="form-control form-control-solid mb-3 mb-lg-0 flatPicker"
                            placeholder="Please Enter your rescheduled date & time here." />
                    </div>
                </div>

            </div>
        </form>
        <script>
            $(document).ready(function() {
                var now = new Date();
                now.setMinutes(now.getMinutes() + 30); // timestamp
                now = new Date(now);
                let minTimeNew = now.getHours() + ":" + now.getMinutes();
                $(".flatPicker").flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    minDate: "today",
                    minTime: minTimeNew,
                });
            })

            function scheduledDetailSubmit() {
                $('button[id="submitbutton"]').attr('disabled', 'disabled');
                $('.indicator-label').css('display', 'none');
                $('.indicator-progress').css('display', 'block');
                $.ajax({
                    url: $("#scheduled_update_detail").attr('action'),
                    method: 'POST',
                    data: $('#scheduled_update_detail').serialize(),
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
                    //         $('#client_from').find('span').remove()

                    //         $.each(err.responseJSON.errors, function(i, error) {
                    //             var el = $(document).find('[name="' + i + '"]');
                    //             el.after($('<span style="color: red;">' + error[0] + '</span>'));
                    //         });
                    //     } else if (err.status == 500) {
                    //         alert("Something went wrong call the admin");
                    //     }
                    // }
                });
            }
        </script>
