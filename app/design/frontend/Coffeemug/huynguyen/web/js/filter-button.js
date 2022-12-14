define([
    'jquery',
    'jquery/ui',
  ], function ($) {
    $.widget('huynguyen.filterButton', {
      /**
       * @private
       */
      _create: function () {
        this._bindCore();
      },

      /**
      *  Core bound events & setup
      * @protected
      */
      _bindCore: function () {
          var widget = this;

          this.element.on('click', $.proxy(function (e) {
              widget._onClick(e);
              e.preventDefault();
          }, this));
      },

      /**
       * @param {jQuery.Event} event
       * @private
       */
      _onClick:function (e){
        var action = $(e.target).data('action');
        if( action == 'open' ){
          $('body').addClass('mobile-active');
        }else{
          $('body').removeClass('mobile-active');
        }
      },
      
    });
  
    return $.huynguyen.filterButton;
  });