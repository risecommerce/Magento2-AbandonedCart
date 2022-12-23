require(
    [
        'jquery',
        'stick-to-me',
    ], function ($) {
        $(document).ready(
            function () {
                $.stickToMe(
                    {
                        layer: '#risecommerce_abandoned_cart_stick_layer',
                        trigger: ['all'],
                        fadespeed: 0,
                        maxamount : 1,
                        maxtime: 0,
                        bgclickclose: false,
                        escclose: false
                    }
                );

            }
        );
    }
);
