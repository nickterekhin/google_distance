<?php


namespace TD;


use ReflectionClass;
use TD\http\Controller;

class Object_Factory
{
    private static $instance;
    /**
     * Object_Factory constructor.
     */
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if(self::$instance==null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function getObject($objectName,$isAjax=false)
    {
        if(isset($objectName))
        {
            $objectName = preg_replace('/_|-/',' ',$objectName);
            $objectName = preg_replace('/\s+/','_',ucwords($objectName));



            if($isAjax)
                $r = new ReflectionClass('TD\http\ajax\\' . $objectName.'Controller');
            else
                $r = new ReflectionClass('TD\http\\' . $objectName.'Controller');

            /** @var Controller $manager_object */
            $manager_object = ($r->newInstanceWithoutConstructor());
            return $manager_object->getInstance();
        }
        return null;
    }
}