<?php

class Blutan {

    private static $blutan;
    public static $instance;

    private function __construct() {
        spl_autoload_register(array($this, 'autoloader'));
        $this->instance = &$this;
    }

    public static function instance() {
        if(!isset(self::$instance)) {
            self::$instance = new Blutan();
        }
    return self::$instance;
    }

    public function frontController($passed_url = '') {
        $url = empty($passed_url) ? isset($_GET['_url']) ? trim($_GET['_url'], '/') : '' : trim($passed_url, '/');
        try{
           @list($controller, $action, $parameters) = explode('/', $url, 3);
        }catch(Exception $e) {
            echo $e;
        }
        echo $controller . "<br/>";
        echo $action . "<br/>";
        echo $parameters . "<br/>";

        if(strlen(trim($controller)) > 0) {
            $controller = ucfirst(strtolower($controller));
            echo "we're in";
            $action = strtolower($action);

          if(@class_exists($controller)) {
                echo "found controller";
      //          $this->$controller = new $controller();
            }
        }

    }

    // yes __autoload() is old and shouldnt be used but it works for now
    // and documentation is good.
    private function autoloader($className) {
        $className = strtolower($className);

        $controller_file = APPLICATION_PATH . 'controllers' . DS . $className . '.php';
        if(file_exists($controller_file)); {
            require_once($controller_file);
        }
    }
}
?>
