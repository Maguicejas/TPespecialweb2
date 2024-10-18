<?php

class Seguridad{
    private $user = null;

    public function showLogin($error = '') {
        require 'Templates/form_login.phtml';
    }

    public function showSignup($error = '') {
        require 'templates/form_signup.phtml';
    }

}
?>