define([
    'jquery',
    'jquery/ui'
  ], function ($) {
    $.widget('huynguyen.button', {
      data: {
        data: '',
      },
  
      /**
       * @private
       */
      _create: function () {
        console.log(this.options);
        this._bindCore();
      },

       /**
         *  Core bound events & setup
         * @protected
         */
        _bindCore: function () {
          var widget = this;

          this.element.on('click', $.proxy(function (e) {
              widget._onClick();
              e.preventDefault();
          }, this));
      },

      /**
       * @param {jQuery.Event} event
       * @private
       */
      _onClick:function (){
        console.log("Data"+ this.data);
      },
      
    });
  
    return $.huynguyen.button;
  });