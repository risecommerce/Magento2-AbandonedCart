define(
    ['jquery', 'domReady!'], function ($) {
        'use strict';

        /**
         * Email validation
         *
         * @param {String} sEmail

         * @returns {Boolean}
         */
        function validateEmail(sEmail)
        {
            var filter
            = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            return filter.test(sEmail);
        }

        /**
         * Email capture for checkout
         *
         * @param {String} url
         */
        function emailCaptureCheckout(url)
        {
            var previousEmail = '';
            $('body').on(
                'blur', 'input[id=customer-email]', function () {

                    var email = $(this).val();
                    if (email === previousEmail) {
                        return false;
                    }

                    if (email && validateEmail(email)) {
                        previousEmail = email;
                        $.post(
                            url, {
                                email: email
                            }
                        );
                    }
                }
            );
        }

        function emailCaptureExitPopup(url)
        {
            $('body').on(
                'click', '.stick_container #risecommerce_abandoned_cart_stick_layer .save', function (ele) {
                    var email = $('.stick_container #risecommerce_abandoned_cart_stick_layer #exit-email').val();
                    var message = $('.stick_container #risecommerce_abandoned_cart_stick_layer .message');
                    if (email && validateEmail(email)) {
                        $('body').loader('show');
                        message.hide();
                        $.post(
                            url, {
                                email: email
                            },function (result) {
                                $('body').loader('hide');
                                if(result['success']) {
                                    message.html(result['success']);
                                    message.show();
                                    setTimeout(
                                        function () {
                                            $.stick_close();
                                            message.hide();
                                        }, 2000
                                    );
                                }
                                else if(result['error']) {
                                    message.html(result['error']);
                                    message.show();
                                }
                                else{
                                    console.log(result);
                                    message.hide();
                                    $.stick_close();
                                }
                            }
                        );
                    }
                    else{
                        message.html('Please enter a valid email address (Ex: johndoe@domain.com).');
                        message.show();
                    }
                }
            );
        }

        /**
     * Exported/return email capture
     *
     * @param {Object} emailCapture
     */
        return function (emailCapture) {
            if (emailCapture.type === 'checkout') {
                emailCaptureCheckout(emailCapture.url);
            }

            if (emailCapture.type === 'exit') {
                emailCaptureExitPopup(emailCapture.url);
            }
        };
    }
);
