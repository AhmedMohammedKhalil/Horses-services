<?php
include_once('HomeController.php');
include_once('UserController.php');
include_once('AdminController.php');
include_once('DoctorController.php');
include_once('TrainerController.php');
$action = $_GET['do'];
if($action != "") {
    if($action == 'showuserLogin') {
        UserController::show_login();
    }
    if($action == 'showdoctorLogin') {
        DoctorController::show_login();
    }
    if($action == 'showuserRegister') {
        UserController::show_register();
    }
    if($action == 'showdoctorRegister') {
        DoctorController::show_register();
    }
    if($action == 'showadminLogin') {
        AdminController::show_login();
    }
    if($action == 'showtrainerLogin') {
        TrainerController::show_login();
    }
    if($action == 'showtrainerRegister') {
        TrainerController::show_register();
    }
    if($action == 'userLogin') {
        $user = new UserController();
        $user->login();
    }
}
