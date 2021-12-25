<?php
class TrainerController {

   

    public static function show_login($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'login.php');
    }

    public static function show_register($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'register.php');
    }
}