<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Load {

    public function view($view, array $data = array()){
        extract($data);
        include APPLICATION . 'views/' . $view . '.php';
    }

    public function segment($number){
        $parmaeter = explode('/', $_SERVER['REQUEST_URI']);
        return $parmaeter[$number];
    }

    public function model($model_name, $model_alias){
        if(!isset($filename))
            $filename = strtolower($model_name) . '.php';

        require APPLICATION . 'models/' . $filename;

        if(!isset($model_alias))
            $model_alias = $model_name;

        if(empty($model_alias))
            throw new Exception("Model name cannot be empty");

        if(!preg_match('!^[a-zA-Z][a-zA-Z0-9_]+$!',$model_alias))
            throw new Exception("Model name '{$model_alias}' is an invalid syntax");

        if(method_exists($this,$model_alias))
            throw new Exception("Model name '{$model_alias}' is an invalid (reserved) name");

        /* get instance of controller object */
        $controller = $this;

        /* model already loaded? silently skip */
        if(isset($controller->$model_alias))
            return true;

        /* instantiate the object as a property */
        $controller->$model_alias = new $model_name($pool_name);

        return true;
    }

    public function database($poolname = null) {
        static $dbs = array();
        /* load config information */
        include APPLICATION . 'config/database.php';
        if(!$poolname)
            $poolname=isset($config['default_pool']) ? $config['default_pool'] : 'default';
        if ($poolname && isset($dbs[$poolname]))
        {
            /* returns object from runtime cache */
            return $dbs[$poolname];
        }

        if($poolname && isset($config[$poolname]))
        {
            include BASE . 'core/DB.php';
            /* add to runtime cache */

            $dbs[$poolname] = new DB($config[$poolname]);
            return $dbs[$poolname];
        }
    }
}
