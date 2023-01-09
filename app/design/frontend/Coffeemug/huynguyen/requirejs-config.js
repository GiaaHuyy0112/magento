var config = {
    map: {
        "*": {
            slickJs: "js/slick.min",
            slickSlider: 'js/slider',
            matchHeightJs: 'js/jquery.matchHeight',
            customModal: 'js/modal',
            phoneValidator: 'js/phone-validator'
        },
    },
    config:{
        mixins:{
            'Magento_Ui/js/lib/validation/validator':{
                'Magento_Ui/js/validation/rules-mixins': true
            } 
        }
    }
};