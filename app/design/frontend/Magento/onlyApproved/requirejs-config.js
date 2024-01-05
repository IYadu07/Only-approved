/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    shim: {
        'onlyApproved/javascript/javascript': {
            deps: ['Magento_Customer/js/invalidation-rules/website-rule'],
            exports: 'javascript'
        }
    }
};
