<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Routing
{
    static function start($param = null){
//        $controllerName = 'BI';
        $actionName = 'index';
        $piecesOfUrl = explode('/', $_SERVER['REQUEST_URI']);

        // load controller
        if (!empty($piecesOfUrl[1])){
            $controllerName = $piecesOfUrl[1];
        }else{
            if(!empty($param['default_controller']))
                $controllerName = $param['default_controller'];
        }

        // load action from controller
        if (!empty($piecesOfUrl[2])){
            $actionName = $piecesOfUrl[2];
        }else{
            if(!empty($param['default_action']))
                $actionName = $param['default_action'];
        }

        $fileWithController = strtolower($controllerName) . '.php';
        $fileWithControllerPath = APPLICATION . "controllers/" . $fileWithController;

        if (is_file($fileWithControllerPath)){
            include $fileWithControllerPath;
        }else{

            exit('error not found controller');
            // TO DO error page 404
        }

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)){
            call_user_func(array($controller, $action), $piecesOfUrl);
        }else{
            exit('error no found action');
            // TO DO show error
        }
    }
}
