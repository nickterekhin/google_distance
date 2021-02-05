(function($){
          $.fn.distanceCalculator = function(options){
              console.log($);
              let obj = $.data(this[0],"distance_calculator");
              if(!obj)
              {
                   obj = new $distance_calculator(options,this[0]);
              }
              $.data( this[ 0 ], "distance_calculator", obj );

              return obj;
          }
          let $distance_calculator = function(options,el){
            let _self = this;
              _self.settings = $.extend(true,{},$distance_calculator.defaults,options);
              _self.$el = $(el);
              _self.$result_section = $(_self.settings.result_section);
              _self.$fromZip = $(_self.settings.fromZip);
              _self.$toZip = $(_self.settings.toZip);
              _self.action = $(_self.settings.action);
              _self.init();
          }
    $.extend($distance_calculator, {
        defaults: {
            result_section:'results',
            fromZip:'input[name="FromZip"]',
            toZip:'input[name="ToZip"]',
            action:'.btn'
        },
        prototype:{
            init:function () {
                let _self = this;
                _self.action.on('click',function(){
                    $distance_calculator.execute(_self);
                });
            }
        },
        execute:function(obj)
        {
            $.ajax({
                method: "POST",
                url: 'index.php?p=Distance&a=driver',
                data: {id:1,cmd:'calculate',fromZip:obj.$fromZip.val(),toZip:obj.$toZip.val()},
                success: function (data, states, jqXHR) {
                    //console.log(data);
                },
                error: function (xHr, txtStatus, err) {
                    //console.log(txtStatus);
                }
            });
        }

    });
})(jQuery);