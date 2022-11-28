define([
    'jquery'
], function($) {
    'use strict';
    $.widget('coffeemug.widget', {
        options:{
            option1: 'data',
        },
        _init: function (){
            console.log(this.options.option1);
            this._bindCore();
        },
        /**
         *  Core bound events & setup
         * @protected
         */
        _bindCore: function () {
            var widget = this;

            this.element.on('click', $.proxy(function (e) {
                widget._onClick();
                e.preventDefault();
            }, this));
        },

        /**
         * @param {jQuery.Event} event
         * @private
         */
        _onClick:function (){
            console.log("Content"+ this.options.content);
        },
        
    });
    return $.coffeemug.widget;
});