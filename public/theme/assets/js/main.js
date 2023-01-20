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

$(document).ajaxError(function myErrorHandler(event, xhr, ajaxOptions, thrownError) {

    if (xhr.status === 401) {
        alert("Your Session Expire Please Login Again");

       /* Swal.fire({
            text: "Your Session Expired Please Login Again!",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });*/

        window.location.reload();
    }

});
