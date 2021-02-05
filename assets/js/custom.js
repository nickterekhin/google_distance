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
              _self.$validate = $(_self.settings.validation);
              _self.init();
          }
    $.extend($distance_calculator, {
        defaults: {
            result_section:'#results',
            fromZip:"input[name='FromZip']",
            toZip:"input[name='ToZip']",
            action:'.btn',
            validation:'#validate-result'
        },
        prototype:{
            init:function () {
                let _self = this;

                _self.action.on('click',function(){
                    let errors =[];
                    _self.$validate.hide();
                    if (_self.$fromZip.val().length>7 || _self.$toZip.val().length>7)
                    {
                        errors.push('ZipCode length can\'t be more then 7 numbers');
                    }
                    if (_self.$fromZip.val().length===0 || _self.$toZip.val().length===0)
                    {
                        errors.push("FromZip and ToZip field are required!");
                    }

                    if(errors.length===0) {
                        $distance_calculator.execute(_self);
                    }
                    else
                    {
                        $.each(errors,function(i,v){
                            _self.$validate.show();
                            _self.$validate.text(v).append('<br>');
                        });

                    }



                });
            }
        },
        execute:function(obj)
        {

            $.ajax({
                method: "POST",
                url: 'index.php?p=Distance&a=driver',
                data: {id:1,cmd:'calculate',fromZip:obj.$fromZip.val(),toZip:obj.$toZip.val()},
                beforeSend:function(){
                    $("#loader").show();
                },
                complete:function(){
                    $("#loader").hide();
                },
                success: function (data, states, jqXHR) {
                    let destination = $.parseJSON(data);
                    obj.$result_section.empty();
                    obj.$result_section.append($distance_calculator.requestOut(destination));
                },
                error: function (xHr, txtStatus, err) {
                    //console.log(txtStatus);
                }
            });
        },
        requestOut:function(data)
        {
            let html = '';
            html+='<table class="table">';
            html+='<thead><tr><th scope="col">From</th><th scope="col">To</th><th scope="col">Distance (km)</th></tr></thead>';
            html+='<tbody><tr><td>'+data.origin_addresses[0]+'</td><td>'+data.destination_addresses[0]+'</td><td>'+((data.rows[0].elements[0].status==='OK')?data.rows[0].elements[0].distance.value:data.rows[0].elements[0].status)+'</td></tr></tbody>'
            html+='</table>';
            return html;

        }


    });
})(jQuery);