<?php
    function isConnect() : bool {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connect']);
    }

    function forceConnection() : void {
        if(!isConnect()){
            header('location: /glotelhoBesoins/pages/sign-in.php');
            exit();
        }
    }