define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function($, modal) {
    'use strict';
    var options = {
        type: 'popup', // popup hoặc slide
        responsive: true,
        title: '',
        buttons: []
    };
    var popup = modal(options, $('#modal-content'));
    $("#subcribeBlock").click(function() {
        $('#modal-content').modal('openModal');
    });
});