define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults:{
            componentVariable1: ko.observable(''),
            exportData: 'Export Data from component 1',
            exports:{
                exportData: 'component2:exportVariable'
            },
            imports: {
                importedData: 'component2:component2ImportVariable'
            },
            links: {
                linkedVariable: 'component2:componentVariable2'
            },
            tracks:{
                linkedVariable: true
            }
        },
        initialize: function () {
            //initialize parent Component
            this._super();
        }

    });
});