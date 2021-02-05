<?php


namespace TD\http\ajax;


class DistanceController  extends AjaxBaseController
{
    function calculate()
    {
        
        $this->respond->script(json_encode(array('hello'=>'world')));
        return $this->respond;
    }

}