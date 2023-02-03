/**
 * Created by Noman on 11/29/2017.
 */

function validateNumbers(key) {
    //getting key code of pressed key
    var keycode = key.which ? key.which : key.keyCode;
    //comparing pressed keycodes
    if (!(keycode == 8 || keycode == 46) && (keycode < 48 || keycode > 57)) {
        return false;
    } else {
        return true;
    }
}

function validateAlphabets(evt) {
    evt = evt ? evt : window.event;
    var charCode = evt.which ? evt.which : evt.keyCode;
    if (
        !(charCode >= 65 && charCode <= 123) &&
        charCode != 32 &&
        charCode != 0
    ) {
        return false;
    } else {
        return true;
    }
}

function validateEmail(EMAIL) {
    var filter =
        /^([\w-]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function toastrAll(status, message) {
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toastr-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    if (status == "success") {
        toastr.success(message);
    } else if (status == "warning") {
        toastr.warning(message);
    } else if (status == "info") {
        toastr.info(message);
    } else if (status == "error") {
        toastr.error(message);
    }
}

$(document).ajaxError(function myErrorHandler(
    event,
    xhr,
    ajaxOptions,
    thrownError
) {
    $('button[id="submitbutton"]').removeAttr('disabled');
    $('.indicator-progress').css('display', 'none');
    $('.indicator-label').css('display', 'block');

    if (xhr.status == 401) {
        alert('Your Session Expire Please Login Again');
        window.location.reload();
    }
    if (xhr.status == 422) {
        // when status code is 422, it's a validation issue
        $('#' + event.target.forms[2].id).find('span.myClass').remove();

        $.each(xhr.responseJSON.errors, function (i, error) {
            var el = $(document).find('[name="' + i + '"]');
            if (el.length === 0) {
                var el = $(document).find('[name="' + i + '[]"]');
            }
            if (el[0].type == 'select-multiple') {
                spanerror = $(
                    '<span class="myClass" style="color: red;">' + error[0] + '</span>'
                );
                el[0].parentElement.children[2].after(spanerror[0]);
            } else if (el[0].type == 'select-one') {
                spanerror = $(
                    '<span class="myClass" style="color: red;">' + error[0] + '</span>'
                );
                el[0].parentElement.children[1].after(spanerror[0]);
            } else {
                el.after(
                    $(
                        '<span class="myClass" style="color: red;">' + error[0] + '</span>'
                    )
                );
            }
        });

    } else if (xhr.status == 500) {
        alert('Something went wrong call the admin');
    }
});
