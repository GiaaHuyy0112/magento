define(['jquery'], 
    function ($) {
    'use strict';

    var widgetMixin = {
        options: {
            option1: "Override"
        },

        /**
         * Added confirming for modal closing
         *
         * @returns {Element}
         */
        _onClick: function () {
            console.log("Content Override");
        }
    };

    return function (targetWidget) {
        // Example how to extend a widget by mixin object
        $.widget('coffeemug.widget', targetWidget, widgetMixin); // the widget alias should be like for the target widget

        return $.coffeemug.widget; //  the widget by parent alias should be returned
    };
});