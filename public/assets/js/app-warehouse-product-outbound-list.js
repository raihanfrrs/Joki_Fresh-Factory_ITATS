/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }

  var dt_brand_table = $('#listWarehouseProductsOutboundTable');
  var warehouse_id = dt_brand_table.attr('data-id');

  if (dt_brand_table.length) {
    var dt_user = dt_brand_table.DataTable({
      ajax: "/listWarehouseProductsOutboundTable/"+ warehouse_id,
      columns: [
        { data: '' },
        { data: 'checkbox', class: 'text-center' },
        { data: 'name', class: 'text-center' },
        { data: 'category', class: 'text-center' },
        { data: 'rack', class: 'text-center' },
        { data: 'actual_stock', class: 'text-center' },
        { data: 'sale_price', class: 'text-center' },
        { data: 'weight', class: 'text-center' },
        { data: 'dimension', class: 'text-center' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          className: 'control',
          searchable: false,
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.checkbox;
          }
        },
        {
          targets: 2,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.name;
          }
        },
        {
          targets: 3,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.category;
          }
        },
        {
          targets: 4,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.rack;
          }
        },
        {
          targets: 5,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.actual_stock;
          }
        },
        {
          targets: 6,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.sale_price;
          }
        },
        {
          targets: 7,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.weight;
          }
        },
        {
          targets: 8,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return full.dimension;
          }
        },
        {
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
              return full.action;
          }
        },
      ],
      order: [[1, 'desc']],
      dom:
        '<"row me-2"' +
        '<"col-md-2"<"me-3"l>>' +
        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
      buttons: [
        {
          text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add To Cart</span>',
          className: 'add-new btn btn-primary ms-3',
          attr: {
            'id': 'btn-add-all-product-to-cart',
            'disabled': true
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Rincian';
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  $("#select_all_product_ids").on('click', function () {
    $("input[id^='checkbox_product_ids']").prop('checked', $(this).prop('checked'));
    $('#btn-add-all-product-to-cart').attr('disabled', !$(this).prop('checked'));
  });

  $(document).on("click", "[id^='checkbox_product_ids']", function () {
    console.log($("[id^='checkbox_product_ids']:checked").length, $("[id^='checkbox_product_ids']").length);

    if ($("[id^='checkbox_product_ids']:checked").length == $("[id^='checkbox_product_ids']").length) {
      $('#select_all_product_ids').prop('checked', true);
    } else {
      $('#select_all_product_ids').prop('checked', false);
    }

    if ($("[id^='checkbox_product_ids']:checked").length > 0) {
      $('#btn-add-all-product-to-cart').attr('disabled', false);
    } else {
      $('#btn-add-all-product-to-cart').attr('disabled', true);
    }

    // $('#btn-add-all-product-to-cart').attr('disabled', !$(this).prop('checked'));
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});