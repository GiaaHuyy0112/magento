define([
    'aliasJs',
    'uiComponent'
], function(alias,Component) {
    alert('Dep');
    return Component.extend({
        initialize: function (config, node) {
            console.log(config);
        }
    });   
});