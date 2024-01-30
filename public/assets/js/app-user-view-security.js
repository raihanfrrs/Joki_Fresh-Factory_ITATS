'use strict';

(function () {
    const formChangePass = document.querySelector('#formChangePassword');

    if (formChangePass) {
        const fv = FormValidation.formValidation(formChangePass, {
            fields: {
                newPassword: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter new password'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Password must be more than 8 characters'
                        },
                        regexp: {
                            regexp: /^(?=.*[A-Z])(?=.*[!@#$%^&*])/,
                            message: 'Password must contain at least one uppercase letter and one symbol (!@#$%^&*)'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'Please confirm new password'
                        },
                        identical: {
                            compare: function () {
                                return formChangePass.querySelector('[name="newPassword"]').value;
                            },
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Password must be more than 8 characters'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: '',
                    rowSelector: '.form-password-toggle'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
        });

        formChangePass.addEventListener('submit', function (e) {
            e.preventDefault();
            
            fv.validate().then(function (status) {
                if (status === 'Valid') {
                    formChangePass.submit();
                }
            });
        });
    }
})();
