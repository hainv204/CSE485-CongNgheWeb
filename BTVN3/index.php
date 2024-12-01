<?php
// index.php - Entry point application
// 1. Connnect to database
require_once './configs/adminDB.php';
// 2. Get information controller and action from URL
# If there is no controller parameter on the URL, default is 'Admin'
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Admin';
# If there is no action parameter on the URL, default is 'index'
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//3. Create path to controller file based on information from URL
$controllerPath = "./controllers/{$controller}Controller.php";
# Get id parameter from URL,
$id = $_GET['id'] ?? null;
//4. Check if controller extists
if (file_exists($controllerPath)) {
    require_once $controllerPath;  // Include controller file
    $controllerClass = $controller . 'Controller';  // Create class controller name
    $controllerObject = new $controllerClass();  // Create controller object

    //5. Check if action exists in controller
    if (method_exists($controllerObject, $action)) {
       // Check if action requires parameters(id)
       $reflection = new ReflectionMethod($controllerObject, $action);
        
       // If method has id parameters
       if ($reflection->getNumberOfParameters() > 0) {
           // If have id parameter, call action with id
           $controllerObject->$action($id);
       } else {
           // If haven't id parameter, call action with id
           $controllerObject->$action();
       }
    } else {
        // Action does not exist
        echo "404 Not Found: The action does not exist";
    }
} else {
    // Controller does not exist
    echo "404 Not Found: The controller does not exist";
}
?>