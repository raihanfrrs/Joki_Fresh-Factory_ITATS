$(document).ready(() => {
    allMasterDetailData();
});

const masterDetailData = (url, targetSelector, search) => {
    return $.get(url, { search: search || 'default' })
        .done(data => {
            $(targetSelector).html(data);
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            return;
        });
};

const allMasterDetailData = () => {
    const adminId = $(".nav-link-admin").attr('data-id');
    const tenantId = $(".nav-link-tenant").attr('data-id');
    const warehouseId = $(".nav-link-warehouse").attr('data-id');
    
    if (adminId) {
        masterDetailData("/ajax/admin-details/"+adminId+'/account', "#data-admin-detail");
    }

    if (tenantId) {
        masterDetailData("/ajax/tenant-details/"+tenantId+'/account', "#data-tenant-detail");
    }

    if (warehouseId) {
        masterDetailData("/ajax/warehouse-details/"+warehouseId+'/information', "#data-warehouse-detail");
    }
};

$('.nav-link-admin').on('click', function () {
    let pos = $(this).attr('id');
    const adminId = $(this).attr('data-id');
  
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
  
    if (pos == 'account') {
      allMasterDetailData();
    } else if (pos == 'security') {
      masterDetailData("/ajax/admin-details/"+adminId+'/security', "#data-admin-detail");
    }
});

$('.nav-link-tenant').on('click', function () {
    let pos = $(this).attr('id');
    const adminId = $(this).attr('data-id');
  
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
  
    if (pos == 'account') {
      allMasterDetailData();
    } else if (pos == 'security') {
      masterDetailData("/ajax/tenant-details/"+adminId+'/security', "#data-tenant-detail");
    }
});

$('.nav-link-warehouse').on('click', function () {
    let pos = $(this).attr('id');
    const warehouseId = $(this).attr('data-id');
  
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
  
    if (pos == 'inforamtion') {
      allMasterDetailData();
    } else if (pos == 'activity') {
      masterDetailData("/ajax/warehouse-details/"+warehouseId+'/activity', "#data-warehouse-detail");
    }
});

$(document).on('click', '#button-trigger-modal-edit-admin', function () {
    let id = $(this).attr('data-id');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/admin/"+id+"/edit",
        method: "get",
        processData: false,
        contentType: false,
        success: function(response) {
            $("#data-edit-admin-modal").html(response);
        },
        error: function(xhr, status, error) {
        }
    });
});


$(document).on('click', '#button-trigger-modal-edit-tenant', function () {
    let id = $(this).attr('data-id');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/tenant/"+id+"/edit",
        method: "get",
        processData: false,
        contentType: false,
        success: function(response) {
            $("#data-edit-tenant-modal").html(response);
        },
        error: function(xhr, status, error) {
        }
    });
});

$(document).on('click', '#button-trigger-modal-edit-warehouse', function () {
    let id = $(this).attr('data-id');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/warehouse/"+id+"/edit",
        method: "get",
        processData: false,
        contentType: false,
        success: function(response) {
            $("#data-edit-warehouse-modal").html(response);
        },
        error: function(xhr, status, error) {
        }
    });
});

$(document).on('click', '#button-trigger-modal-edit-warehouse-category', function () {
    let id = $(this).attr('data-id');

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/ajax/warehouse-category/"+id+"/edit",
        method: "get",
        processData: false,
        contentType: false,
        success: function(response) {
            $("#data-edit-warehouse-category-modal").html(response);
        },
        error: function(xhr, status, error) {
        }
    });
});

$(document).on('input', '#rental_price',function () {
    var value = $(this).val().replace(/\D/g, '');
    $(this).val(formatRupiah(value));
});

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var formatted = reverse.match(/\d{1,3}/g).join('.').split('').reverse().join('');
    return 'Rp ' + formatted;
}