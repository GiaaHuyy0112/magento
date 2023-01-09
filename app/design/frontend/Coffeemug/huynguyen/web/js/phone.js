define([
    'ko',
    'Magento_Ui/js/form/element/abstract'
], function (ko, Abstract) {
    'use strict';
 
    return Abstract.extend({
        defaults:{
            listens:{
                "checkout.steps.shipping-step.shippingAddress.shipping-address-fieldset.country_id:value" : "onChanged"
            }
        },
        initialize: function () {
            //initialize parent Component
            this._super();
        },
        onChanged: function (country) {
            if( country == "VN" ){
                this.value('+84');
            }else{
                this.value('');
            }
        }

    });
});