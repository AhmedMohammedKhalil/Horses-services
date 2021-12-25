<?php
class DoctorController {

    

    public static function show_login($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'login.php');
    }

    public static function show_register($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'register.php');
    }
}