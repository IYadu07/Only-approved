/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    deps: [
        'Magento_Theme/js/theme'
    ]
};

var config = {
    paths: {
        'owl-carousel': 'js/owl.carousel',
        'js-file-alias': 'js/custom'
    },
    shim: {
        'js-file-alias': {
            deps: ['jquery'],
            exports: 'jQuery'
        },
        'owl-carousel': {
            deps: ['jquery'],
            exports: 'owl-carousel'
        }
    }
};