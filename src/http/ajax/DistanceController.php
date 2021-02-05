<?php


namespace TD\http\ajax;


use TD\services\GoogleDistanceCalculator;

class DistanceController  extends AjaxBaseController
{
    function calculate()
    {
        $calculator = new GoogleDistanceCalculator();
        $result = $calculator->calculate($_REQUEST['fromZip'],$_REQUEST['toZip']);
        $this->respond->script(json_encode($result));
        return $this->respond;
    }

}