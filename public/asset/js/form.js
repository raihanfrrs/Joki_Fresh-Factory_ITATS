$(document).on('click', '#admin-form-btn', function () {
    $('#admin-form').submit();
});

$('#admin-form').submit(function(event) { 
    event.preventDefault();

    const formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: '/master/admin',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Admin Created Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 422) {
                var errors = jqXHR.responseJSON.errors;
        
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