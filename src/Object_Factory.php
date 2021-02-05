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

    function getObject($objectName)
    {
        if(isset($objectName))
        {

            $objectName = preg_replace('/_|-/',' ',$objectName);
            $objectName = preg_replace('/\s+/','_',ucwords($objectName));

            $r = new ReflectionClass('TD\http\Controller' . $objectName);
            /** @var Controller $manager_object */
            $manager_object = ($r->newInstanceWithoutConstructor());
            return $manager_object->getInstance();
        }
        return null;
    }
}