<?php
    function verificar($res) {
        if($res->user) {
            return;
        } else {
            header('Location: ' . BASE_URL . 'MostrarLogin');
            die();
        }
    }
?>
