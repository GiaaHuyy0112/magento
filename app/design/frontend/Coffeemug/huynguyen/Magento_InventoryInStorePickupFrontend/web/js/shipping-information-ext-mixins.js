/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/customer-data'
], function (quote, customerData) {
    'use strict';

    var countryData = customerData.get('directory-data');

    var storePickupShippingInformation = {
        defaults: {
            template: 'Magento_InventoryInStorePickupFrontend/shipping-information',
        },

        /**
         * Get shipping method title based on delivery method.
         *
         * @return {String}
         */
        getShippingMethodTitle: function () {
            var shippingMethod = quote.shippingMethod(),
                locationName = '',
                title;

            if (!this.isStorePickup()) {

                return this._super();
            }

            title = shippingMethod['carrier_title'] + ' - ' + shippingMethod['method_title'];

            if (quote.shippingAddress().firstname !== undefined) {
                locationName = quote.shippingAddress().firstname + ' ' + quote.shippingAddress().lastname;
                title += ' "' + locationName + '"';
            }

            return title;
        },

        /**
         * Get is store pickup delivery method selected.
         *
         * @returns {Boolean}
         */
        isStorePickup: function () {
            var shippingMethod = quote.shippingMethod(),
                isStorePickup = false;

            if (shippingMethod !== null) {
                isStorePickup = shippingMethod['carrier_code'] === 'instore' &&
                    shippingMethod['method_code'] === 'pickup';
            }

            return isStorePickup;
        },

        /**
         * @param {Number} countryId
         * @return {*}
         */
         getCountryName: function (countryId) {
            return countryData()[countryId] != undefined ? countryData()[countryId].name : ''; //eslint-disable-line
        },

        getEstimateDelivery: function () {
            var countryId = quote.shippingAddress().countryId;
            var country = this.getCountryName(countryId);
            var days;
            if( countryId == "VN" ){
                days = "2-4";
                return `The order will be delivered to ${country} in next ${days} days`;
            }else if ( countryId == "US" ){
                days = "11-14";
                return `The order will be delivered to ${country} in next ${days} days`;
            }else{
                days = "5-7";
                return `The order will be delivered to ${country} in next ${days} days`;
            }
        }
    };

    return function (shippingInformation) {
        return shippingInformation.extend(storePickupShippingInformation);
    };
});
