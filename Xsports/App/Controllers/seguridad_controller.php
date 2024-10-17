<?php
require_once 'App/Models/user_model.php';
require_once 'App/Views/seguridad_view.php';


class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new Seguridad();
    }

    public function showLogin() {
    
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        
        $userFromDB = $this->model->getUser($email);

        
        if($userFromDB && password_verify($password, $userFromDB->contraseña)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->ID_U;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start(); 
        session_destroy(); 
        header('Location: ' . BASE_URL);
    }
}


