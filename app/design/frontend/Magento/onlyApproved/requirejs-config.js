/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            'custom-script': 'Magento_onlyApproved/js/javascript'
        }
    }
};



// var config = {
//     map: {
//         '*': {
//             alias: 'Vendor_Module/js/complex/path/amd-module'
//         },
//         'Vendor_Module/js/amd-module': {
//             alias_two: 'Vendor_Module/js/complex/path/amd-module-two'
//         }
//     },

//     paths: {
//         'alias': 'library/file',
//         'another-alias': 'https://some-library.com/file'
//     }
    
    // paths: {

    // },
    // deps: [...],
    // shim: {...},
    // config: {
    //     mixins: {...},
    //     text: {...}
    // }
// }


// working

// var config = {
//     deps: [
//         'javascript/javascript'
//     ],
// };

// var config = {
//     shim: {
//         'onlyApproved/javascript/javascript': {
//             deps: ['Magento_Customer/js/invalidation-rules/website-rule'],
//             exports: 'javascript'
//         }
//     }
// };
