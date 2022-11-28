var config = {
    map: {
        "*": {
            aliasJs: "js/alias",
            depJs: "js/dep",
            jWidget: "js/jquery-widget",
            jsLayout: "js/jsLayout"
        },
    },
    paths: {},
    deps: ["depJs"],
    shim: {
        'js/shim':['js/3rd']
    },
    config: {
        mixins: {
            'js/widget':{
                'js/widget-mixin':true
            }
        },
        text: {},
    }
};