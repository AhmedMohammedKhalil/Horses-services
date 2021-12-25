<?php
class AdminController {

    

    public static function show_login($adminroute = '../admin/') {
        header('Location: '.$adminroute.'login.php');
    }

    
}