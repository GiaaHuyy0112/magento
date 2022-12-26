define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults:{
            componentVariable2: ko.observable(''),
            component2ImportVariable: ko.observable('Data from component 2'),
        },
        initialize: function () {
            //initialize parent Component
            this._super();
        }


    });
});