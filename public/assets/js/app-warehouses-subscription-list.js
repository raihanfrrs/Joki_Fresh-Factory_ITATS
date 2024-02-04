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

  var dt_brand_table = $('#listWarehousesSubscriptionTable');

  if (dt_brand_table.length) {
    var dt_user = dt_brand_table.DataTable({
      ajax: "/listWarehousesTable/choose",
      columns: [
        { data: '' },
        { data: 'index', class: 'text-center' },
        { data: 'name' },
        { data: 'category', class: 'text-center' },
        { data: 'capacity', class: 'text-center' },
        { data: 'facility'},
        { data: 'surface_area', class: 'text-center' },
        { data: 'building_area', class: 'text-center' },
        { data: 'city', class: 'text-center' },
        { data: 'address' },
        { data: 'description' },
        { data: 'admin', class: 'text-center' },
        { data: 'created_at', class: 'text-center' },
        { data: 'status', class: 'text-center' },
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
            return full.index;
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
          render: function (data, type, full, meta) {
            return full.capacity;
          }
        },
        {
          targets: 5,
          render: function (data, type, full, meta) {
            return full.facility;
          }
        },
        {
          targets: 6,
          render: function (data, type, full, meta) {
            return full.surface_area;
          }
        },
        {
          targets: 7,
          render: function (data, type, full, meta) {
            return full.building_area;
          }
        },
        {
          targets: 8,
          render: function (data, type, full, meta) {
            return full.city;
          }
        },
        {
          targets: 9,
          render: function (data, type, full, meta) {
            return full.address;
          }
        },
        {
          targets: 10,
          render: function (data, type, full, meta) {
            return full.description;
          }
        },
        {
          targets: 11,
          render: function (data, type, full, meta) {
            return full.admin;
          }
        },
        {
          targets: 12,
          render: function (data, type, full, meta) {
            return full.created_at;
          }
        },
        {
          targets: 13,
          render: function (data, type, full, meta) {
            return full.status;
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
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
    });
  }

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
