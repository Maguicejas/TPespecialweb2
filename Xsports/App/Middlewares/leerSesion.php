<?php

function sesion($res){
    session_start();
    if(isset($_SESSION['ID_USER'])){
     $res-> user= new stdClass();
     $res-> user->ID_U=$_SESSION['ID_USER'];
     $res-> user->email=$_SESSION['EMAIL_USER'] ;
    return ;
    }else{
        
        header('Location: ' . BASE_URL . 'MostrarLogin');
    }

}

?>