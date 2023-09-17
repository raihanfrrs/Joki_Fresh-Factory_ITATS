$(document).ready(() => {
    allMasterData();
});

const masterData = (url, targetSelector, search) => {
    return $.get(url, { search: search || 'default' })
        .done(data => {
            $(targetSelector).html(data);
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            return;
        });
};

const allMasterData = () => {
    masterData("/ajax/master-admin-card", "#data-master-admin")
        // .then(() => masterData("/ajax/master-admin-table", "#data-master-admin"))
        .fail(errors => {
            return;
        });
};

$(document).on('click', '#table-view-btn', function(){
    masterData("/ajax/master-admin-table", "#data-master-admin");

    $(this).html('List View');
    $(this).attr('id', 'card-view-btn');
});

$(document).on('click', '#card-view-btn', function(){
    allMasterData();

    $(this).html('Table View');
    $(this).attr('id', 'table-view-btn');
});