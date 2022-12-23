var config = {
    'paths': {
        'dmpt': 'Risecommerce_AbandonedCart/js/dmpt',
        'stick-to-me' : 'Risecommerce_AbandonedCart/js/stick-to-me'
    },
    'shim': {
        'dmpt': {
            exports: '_dmTrack',
            deps: ['jquery']
        },
        'stick-to-me': {
            deps: ['jquery']
        }
    }
};
