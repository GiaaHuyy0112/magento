define([
    'jquery',
    'jquery/ui'
  ], function ($) {
    $.widget('huynguyen.button', {
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
        var section = $(e.target).data('section');
        $('.btn-action').each((i,el)=>{
          $(el).removeClass('active');
        });
        $(e.target).addClass('active');
        $('.section').each((i,el)=>{
          $(el).removeClass('active');
        });
        $('.section-'+section).each((i,el)=>{
          $(el).addClass('active');
        });
      },
      
    });
  
    return $.huynguyen.button;
  });