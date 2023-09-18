$(document).on('click', '#admin-form-btn', function () {
    $('#admin-form').submit();
});

$('#admin-form').submit(function(event) { 
    event.preventDefault();

    const formData = $(this).serialize();

    console.log(formData);

    $.ajax({
        type: 'POST',
        url: '/master/admin',
        data: formData,
        success: function(response) {
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 422) {
                var errors = jqXHR.responseJSON.errors;
        
                // Mengosongkan pesan kesalahan sebelumnya (jika ada)
                $('.error-messages').empty();
        
                for (var field in errors) {
                    var errorMessages = errors[field];
                    var fieldName = field.split('.').pop();


                    $('[id^="'+fieldName+'"]').append(errorMessages);
                }
            } else {
                $('#error-message').html('Terjadi kesalahan saat mengirim formulir.');
            }
        }
        
    });
});