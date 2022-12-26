define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults:{
            array : ko.observableArray([0]),
            firstName: ko.observable("Huy"),
            lastName: ko.observable("Nguyen"),
            items : ko.observableArray([
                { name: "Huy" },
                { name: "Gia" },
            ]),
            provider: '${$.provider}',
            itemsLastName : '',
            textLink: ko.observable(''),
            tracks: {
                items: true,
                itemsLastName: true,
            },
            links:{
                textLink : '${ $.provider }:childLink'
            },
            imports:{
                itemsLastName: '${ $.provider }:itemsLastName'
            },
        },
        initialize: function () {
            //initialize parent Component
            this._super();
            this.content = ko.observable(this.content);
            setTimeout(() => {
                this.content(this.waiting);
            }, 5000);
            this.count = ko.observable(0)
            this.fullName = ko.computed(()=>{
                return this.firstName() + " " + this.lastName() + " - " + this.count();
            },this);
            console.log(this.provider);
        },

        onClick: function(config){
            var override = config.update;
            console.log(override);
            this.content(override);
        },

        clickAdd: function(){
            this.count(this.count() + 1);
        },
        clickSub: function(){
            this.count(this.count() - 1);
        },
        clickAuto: function(){
            setInterval(this.increaseCount,1000, this.count)
        },

        increaseCount: function(count){
            count(count() + 1);
        },

        clickSubItem: function(self){
            console.log(this.items.remove(self));
            console.log(self);
        }
 
    });
});