<?php
require_once 'Libs/response.php';

require_once 'App/Middlewares/leerSesion.php';
require_once 'App/Middlewares/verificarSesion.php';

require_once 'App/Controllers/controler.php';
require_once 'App/Controllers/seguridad_controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res=new Response();

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
        case 'home':
             $controller= new TaskController($res);
            $controller->showHome();
            break;

        case 'listar':
            $controller = new TaskController($res);
            $controller->showCategorias();
            break;

       case 'actividades':
        $controller = new TaskController($res);
        $controller->showItems();
        break;

        case 'categoria':
         $controller = new TaskController($res);
         $controller->showItemsCategoria($params[1]);
         break;

         case 'informacion':
            $controller = new TaskController($res);
            $controller->showItemsinformacion($params[1]);
            break;

        
        
       //login y administracion de pagina
        case 'administrar':
            sesion($res);
            verificar($res); // Verifica que el usuario esté logueado o redirige a login
                $controller = new TaskController($res);
                $controller->showFormAdd();
                $controller->showaddactividad();
                break;

        case 'MostrarLogin':
            $controller= new AuthController();
            $controller->showLogin();
            break;
        case 'login':
            $controller= new AuthController();
            $controller->login();
            break;
        case 'logout':
            $controller= new AuthController();
            $controller->logout();
            break;
 

        //ABM
        case 'nuevaCategoria':
            sesion($res); 
            verificar($res); 
                $controller = new TaskController($res);
                $controller->agregarCategoria();
                break;
                
        case 'nuevaactividad':
            sesion($res); // Setea $res->user si existe session
            verificar($res); 
                $controller = new TaskController($res);
                $controller->agregarActividad();
                break;

        case 'eliminarActividad':
        sesion($res);
        verificar($res); 
        $controller = new TaskController($res);
        $controller->eliminarActividad();
        break;

        case 'eliminarCategoria':
            sesion($res);
            verificar($res); 
            $controller = new TaskController($res);
            $controller->eliminarCategoria();
            break;

        case 'editar':
            sesion($res);
            verificar($res); 
            $controller = new TaskController($res);
            $controller->editarCategoria();
            break;

        case 'editarActividad':
            sesion($res);
            verificar($res); 
            $controller = new TaskController($res);
            $controller->editarActividad();
            break;
         
     
    default: 
    $controller = new TaskController($res);
    $controller->showError();
        break;
}
