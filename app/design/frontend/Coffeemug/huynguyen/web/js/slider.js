define([
    'jquery',
    'slickJs',
    'uiComponent',
    'matchHeightJs'
], function($,slick,Component) {
    'use strict';
    return Component.extend({
        defaults:{
            
        },
        initialize: function () {
            this._super();
            console.log("Working!!!");
            $('.products.list').slick({
                "slidesToShow":4,
                "appendArrows":".button-wrapper",
                "infinite":false,
                "responsive": [
                    {
                      breakpoint: 991,
                      settings: {
                        slidesToShow: 2,
                      }
                    }
                  ]
            });
            $('#slickSlider .product-item-title').matchHeight();
        },
 
    });
});