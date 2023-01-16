define([
    'jquery',
    'ko',
    'uiComponent'
], function ( $ ,ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults:{
            products: ko.observableArray([]),
        },
        initialize: function () {
            //initialize parent Component
            this._super();
            this.getProducts();
        },
        getProducts: function () {
            $.getJSON("/coffeemugex1/expost/page1").then((data)=>{
                this.products(data);
            });
        }

    });
});