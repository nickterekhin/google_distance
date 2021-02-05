<?php


namespace TD\http;


abstract class Controller
{
    private static $_instances = array();


    public static function getInstance() {
        $class = get_called_class();
        if (!isset(self::$_instances[$class])) {
            self::$_instances[$class] = new $class();
        }
        return self::$_instances[$class];
    }
    abstract protected function index();
    public function render($action){
        $content = '';
        switch ($action){
            default:
                $content = $this->index();
        }

        return $content;

    }
    public function View($viewName, array $args=array())
    {
        ob_start();

        if(!empty($args)) {

            // extract($args,EXTR_SKIP);
            foreach ($args AS $key => $val) {
                $$key = $val;
            }
        }

        $file = BASEDIR.'/src/view/'.$viewName . '.php';

        include( $file );

        $ret_obj= ob_get_clean();

        return $ret_obj;
    }


}