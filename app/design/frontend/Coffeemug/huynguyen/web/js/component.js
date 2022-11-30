define(['ko'],function (ko) {
    'use strict';
    return function (config) {
        var string = '';
        if(config.content != ""){
            string = config.content; 
        }
        return {
            content: ko.observable(string),
        }
    }
});