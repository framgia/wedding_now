var SnippetLogin = function () {
    var s = $("#m_login"), n = function (e, i, a) {
        var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
        e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeInLeft animated"), l.find("span").html(a)
    }, o = function () {
        s.removeClass("m-login--forget-password"), s.removeClass("m-login--signup"), s.addClass("m-login--signin"), mUtil.animateClass(s.find(".m-login__signin")[0], "fadeInLeft animated")
    }, e = function () {
        $("#m_login_forget_password").click(function (e) {
            e.preventDefault(), s.removeClass("m-login--signin"), s.removeClass("m-login--signup"), s.addClass("m-login--forget-password"), mUtil.animateClass(s.find(".m-login__forget-password")[0], "fadeInLeft animated")
        }), $("#m_login_forget_password_cancel").click(function (e) {
            e.preventDefault(), o()
        }), $("#m_login_signup").click(function (e) {
            e.preventDefault(), s.removeClass("m-login--forget-password"), s.removeClass("m-login--signin"), s.addClass("m-login--signup"), mUtil.animateClass(s.find(".m-login__signup")[0], "fadeInLeft animated")
        }), $("#m_login_signup_cancel").click(function (e) {
            e.preventDefault(), o()
        })
    };
    return {
        init: function () {
            e(), $("#m_login_signin_submit").click(function (e) {
                e.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        email: {required: !0, email: !0},
                        password: {required: !0}
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (e, i, a, l) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), n(r, "danger", "Incorrect username or password. Please try again.")
                        }, 2e3)
                    }
                }))
            }), $("#m_login_signup_submit").click(function (e) {
                e.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        fullname: {required: !0},
                        email: {required: !0, email: !0},
                        password: {required: !0},
                        rpassword: {required: !0},
                        agree: {required: !0}
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (e, i, a, l) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), o();
                            var e = s.find(".m-login__signin form");
                            e.clearForm(), e.validate().resetForm(), n(e, "success", "Thank you. To complete your registration please check your email.")
                        }, 2e3)
                    }
                }))
            }), $("#m_login_forget_password_submit").click(function (e) {
                e.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (e, i, a, l) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), o();
                            var e = s.find(".m-login__signin form");
                            e.clearForm(), e.validate().resetForm(), n(e, "success", "Cool! Password recovery instruction has been sent to your email.")
                        }, 2e3)
                    }
                }))
            })
        }
    }
}();
jQuery(document).ready(function ($) {

    SnippetLogin.init()
    ;
    let timeoutSearch = null;

    $('body').on('keyup', '#register-address', function (event) {

        event.preventDefault();

        let keyword = $(this).val();

        clearTimeout(timeoutSearch);

        $('#register-address').addClass('input-focus');

        timeoutSearch = setTimeout(function () {

            let html = '';

            if('' !== keyword) {

                $.ajax({
                    url: route('client.get-district', { keyword: keyword }),
                    type: 'GET',
                    beforeSend: function() {
                        $('.spin-custom').removeClass('d-none');
                    }
                })
                .done(function(res) {

                    if (res.length > 0 ) {

                        res.forEach(function (element) {

                            let li = '<li><p data-district-id="' + element.id + '">' + element.name + ', ' + element.city.name + '</p></li>';

                            html += li;
                        });

                        $('.list-location').html(html);

                        if (0 !== res.length) {

                            $('.search-location').show();
                        } else {

                            $('.search-location').hide();
                        }
                    } else {

                        $('.list-location').html(html);
                    }

                    setTimeout(function() {
                        $('.spin-custom').addClass('d-none');
                    }, 300);
                })
                .fail(function() {

                    $('.search-location').hide();

                    $('#register-address').removeClass('input-focus');
                });
            }
        }, 500);
    });

    $('body').on('click', '.list-location p', function(event) {

        event.preventDefault();

        $('#register-address').val($(this).text());

        $('.search-location').hide();

        $('#district').val($(this).attr('data-district-id'));

        $('#register-address').removeClass('input-focus');
    });

    $('#btnAgree').prop('checked', false);

    $('#btnAgree').click(function (event) {
        $('#btnRegister').prop('disabled', function (index, value) {
            return !value;
        });
    });

    $('#form-register').validate({
        onkeyup: function(element) {
            $(element).valid();
        },
        rules: {
            name: {
                required: true,
                minlength: 6,
                maxlength: 25,
            },
            phone: {
                required: true,
                maxlength: 10,
            },
            gender: {
                required: true,
            },
            address: {
                required: true,
                minlength: 10,
                maxlength: 100,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 50,
            },
            password_confirmation: {
                required: true,
                equalTo: '#register-password',
            },
            role: {
                required: true,
            },
        },
        messages: {
            name: {
                required: Lang.get('auth.required.yourname'),
                minlength: Lang.get('auth.min.yourname'),
                maxlength: Lang.get('auth.max.yourname'),
            },
            phone: {
                required: Lang.get('auth.required.phone'),
                maxlength: Lang.get('auth.max.phone'),
            },
            gender: {
                required: Lang.get('auth.required.gender'),
            },
            address: {
                required: Lang.get('auth.required.address'),
                minlength: Lang.get('auth.min.address'),
                maxlength: Lang.get('auth.max.address'),
            },
            email: {
                required: Lang.get('auth.required.email'),
                email: Lang.get('auth.email.email'),
            },
            password: {
                required: Lang.get('auth.required.password'),
                minlength: Lang.get('auth.min.password'),
                maxlength: Lang.get('auth.max.password'),
            },
            password_confirmation: {
                required: Lang.get('auth.required.password_confirm'),
                equalTo: Lang.get('auth.equalTo.password'),
            },
            role: {
                required: Lang.get('role'),
            },
        },
        success: function(e) {
            e.remove();
        },
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.radio-choose-regiter'));
            } else  {
                error.insertAfter( element );
            }
        }
    });

    $('#form-login').validate({
        onkeyup: function(element) {
            $(element).valid();
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        success: function(e) {
           e.remove();
        },
        messages: {
            email: {
                required: Lang.get('auth.required.email'),
                email: Lang.get('auth.email.email'),
            },
            password: {
                required: Lang.get('auth.required.password'),
            },
        },
    });
});
