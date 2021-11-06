!function (e) {
    "use strict";
    if (e(".menu-item.has-submenu .menu-link").on("click", function (s) {
        s.preventDefault(), e(this).next(".submenu").is(":hidden") && e(this).parent(".has-submenu").siblings().find(".submenu").slideUp(200), e(this).next(".submenu").slideToggle(200)
    }), e("[data-trigger]").on("click", function (s) {
        s.preventDefault(), s.stopPropagation();
        var n = e(this).attr("data-trigger");
        e(n).toggleClass("show"), e("body").toggleClass("offcanvas-active"), e(".screen-overlay").toggleClass("show")
    }), e(".screen-overlay, .btn-close").click(function (s) {
        e(".screen-overlay").removeClass("show"), e(".mobile-offcanvas, .show").removeClass("show"), e("body").removeClass("offcanvas-active")
    }), e(".btn-aside-minimize").on("click", function () {
        window.innerWidth < 768 ? (e("body").removeClass("aside-mini"), e(".screen-overlay").removeClass("show"), e(".navbar-aside").removeClass("show"), e("body").removeClass("offcanvas-active")) : e("body").toggleClass("aside-mini")
    }), e(".select-nice").length && e(".select-nice").select2(), e("#offcanvas_aside").length) {
    }
    e(".darkmode").on("click", function () {
        e("body").toggleClass("dark")
    })
}(jQuery);

(function ($) {
    'use strict';

    function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(input).closest('.image-box').find('.preview_image').prop('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {

        $('#shop-url')
            .on('keyup', function () {
                let displayURL = $(this).closest('.form-group').find('span small');
                displayURL.html(displayURL.data('base-url') + '/<strong>' + $(this).val().toLowerCase() + '</strong>');
            })
            .on('change', function () {
                $('.shop-url-wrapper').addClass('content-loading');
                $(this).closest('form').find('button[type=submit]').addClass('btn-disabled').prop('disabled', true);

                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: {
                        url: $(this).val(),
                        reference_id: $('input[name=reference_id]').val()
                    },
                    success: res => {
                        $('.shop-url-wrapper').removeClass('content-loading');
                        if (res.error) {
                            $('.shop-url-status').removeClass('text-success').addClass('text-danger').text(res.message);

                        } else {
                            $('.shop-url-status').removeClass('text-danger').addClass('text-success').text(res.message);
                            $(this).closest('form').find('button[type=submit]').prop('disabled', false).removeClass('btn-disabled');
                        }
                    },
                    error: () => {
                        $('.shop-url-wrapper').removeClass('content-loading');
                    }
                });
            });

        $('.custom-select-image').on('click', function (event) {
            event.preventDefault();
            $(this).closest('.image-box').find('.image_input').trigger('click');
        });

        $('.image_input').on('change', function () {
            readURL(this);
        });
    });
})(jQuery);
