define([
    'jquery',
], function ($) {
    'use strict';

    return function (validator) {

        validator.addRule(
            'validate-number',
            function (value, params, additionalParams) {
                return $.mage.isEmptyNoTrim(value) || value.match(/(^[\+])+(84)+([0-9{8}]*$)/);
            },
            $.mage.__("The phone number should match with Viet Nam phone number (+84XXXXXXXXX)")
        );

        return validator;
    };
});