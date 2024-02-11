$(document).on('click', '#button-submit-register-tenant', function () {
    console.log("Awdaw");
    let form = $(".form-submit-register-tenant");
    form.attr('action', '/sign-up');
    form.attr('onsubmit', '');

    form.submit();
});