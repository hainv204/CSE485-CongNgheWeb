<?php
$controller = isset($_GET['controller'])?$_GET['controller']:'Auth';
$action = isset($_GET['action'])?$_GET['action']:'index';

$controllerPath = "./controllers/{$controller}Controller.php";

if(file_exists($controllerPath)){
    require_once($controllerPath);
    $controllerClass = $controller.'Controller';
    $controllerObject = new $controllerClass();

    if (method_exists($controllerObject, $action))
            $controllerObject->$action();
    else echo "Action not found";
}
else echo "Controller not found";
?>