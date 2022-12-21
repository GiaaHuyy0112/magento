define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        initialize: function () {
            //initialize parent Component
            this._super();
            this.content = ko.observable(this.content);
            setTimeout(() => {
                this.content(this.waiting);
            }, 5000);
            this.array = ko.observableArray([0]);
        },

        onClick: function(config){
            var override = config.update;
            console.log(override);
            this.content(override);
        },

        clickAdd: function(){
            var nextNumber = this.array()[this.array().length-1]+1;
            this.array.push(nextNumber);
            console.log(nextNumber);
        },
        clickSub: function(){
            console.log(this.array.pop());
        }
 
    });
});