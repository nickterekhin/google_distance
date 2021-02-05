<?php


class ClassLoader
{
        private $namespace_mapping = array('TD'=>'src');

    
        public function register()
        {
            spl_autoload_register(array($this,'load'),true);
        }
        protected function load($class)
        {
            if($file=$this->getClassFile($class))
            {
                require $file;
            }
        }
        private function getClassFile($class)
        {

            if (false !== $pos = strrpos($class, '\\')) {
                $namespace = substr($class, 0, $pos);
                $className = substr($class,$pos+1);

                $file =str_replace('\\', DIRECTORY_SEPARATOR, str_replace('TD','src',$namespace)).'/'.$className.'.php';
                if (file_exists($file)) {
                    return $file;
                }
            }
            return false;
        }
}