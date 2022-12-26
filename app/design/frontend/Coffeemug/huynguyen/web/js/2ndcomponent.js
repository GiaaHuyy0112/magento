define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults:{
            itemsLastName : ko.observableArray([
                { name: "Tran" },
                { name: "Nguyen" }
            ]),
            childLink: ko.observable(''),
            dataExports: ko.observable('Huy Nguyen - 23'),
            tracks: {
                itemsLastName: true
            },
            exports: {
                dataExports: '${ $.provider }:dataExports'
            },
            // links:{
            //     childLink : '${ $.provider }:textLink'
            // },
            listens : {
                'childLink': 'logTrack'
            }
        },
        initialize: function () {
            //initialize parent Component
            this._super();
        },

        logTrack: (link) => {
            console.log('TextLink child log track:' + link);
        }
 
    });
});