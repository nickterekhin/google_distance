<?php


namespace TD\http\ajax;


use TD\helpers\RespondJsScript;
use TD\http\Controller;

abstract class AjaxBaseController extends Controller
{
    /**
     * @var RespondJsScript
     */
    protected $respond;

    /**
     * AjaxBaseController constructor.
     */
    public function __construct()
    {
        $this->respond = new RespondJsScript();
        
    }
    protected function index()
    {
        // TODO: Implement index() method.
    }
    public function execute()
      {
          $id = $_REQUEST['id'];

          if(isset($id) && $id==1)
          {
              $function = !empty($_REQUEST['cmd'])?$_REQUEST['cmd']:'';
              /** @var RespondJsScript $r*/
              $r = $this->$function();
              echo $r->getOutput();
              die();
          }
      }
}