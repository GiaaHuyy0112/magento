var config = {
    map: {
        "*": {
            slickJs: "js/slick.min",
            slickSlider: 'js/slider',
            matchHeightJs: 'js/jquery.matchHeight',
            customModal: 'js/modal',
            phoneValidator: 'js/phone-validator',
            'Magento_InventoryInStorePickupFrontend/template/shipping-information.html':
                'Magento_InventoryInStorePickupFrontend/template/shipping-information-override.html'
        },
    },
    config:{
        mixins:{
            'Magento_Ui/js/lib/validation/validator':{
                'Magento_Ui/js/validation/rules-mixins': true
            },
            'Magento_Checkout/js/view/shipping-information':{
                'Magento_InventoryInStorePickupFrontend/js/shipping-information-ext-mixins':true
            }
        }
    }
};