$(document).ready(() => {
    allTenantDetailData();
});

const tenantDetailData = (url, targetSelector, property) => {
    return $.get(url, property)
        .done(data => {
            $(targetSelector).html(data);

            if (data != 0) {
                $(targetSelector).removeClass(property);
            } else {
                $(targetSelector).addClass(property);
            }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            return;
        });
};

const allTenantDetailData = () => {
    tenantDetailData("/ajax/tenant-details/shopping-cart-count", "#label-total-shopping-cart-count", 'd-none');
    tenantDetailData("/ajax/tenant-details/new-payment-count", "#label-total-new-payment-count", '');
};

$(document).on('click', '#button-submit-register-tenant', function () {
    console.log("Awdaw");
    let form = $(".form-submit-register-tenant");
    form.attr('action', '/sign-up');
    form.attr('onsubmit', '');

    form.submit();
});

$(document).on('click', '#button-delete-shopping-cart', function () {
    let id = $(this).attr('data-id');
    
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/shopping-cart/"+id+"/delete",
        method: "get",
        processData: false,
        contentType: false,
        success: function(response) {
            allTenantDetailData();
            $("#shopping-cart-card").load(location.href + " #shopping-cart-card");
        },
        error: function(xhr, status, error) {
        }
    });
});

$(document).on('change', '#warehouse_subscription_id', function () {
    let id = $(this).attr('data-id');
    let warehouse_subscription_id = $(this).find(':selected').val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/shopping-cart/"+id+"/update-subscription",
        method: "post",
        data: {warehouse_subscription_id: warehouse_subscription_id},
        success: function(response) {
            $("#shopping-cart-card").load(location.href + " #shopping-cart-card");
        },
        error: function(xhr, status, error) {
        }
    });
});