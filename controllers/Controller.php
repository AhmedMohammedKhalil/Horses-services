<?php
session_start();
include_once('HomeController.php');
include_once('UserController.php');
include_once('AdminController.php');
include_once('DoctorController.php');
include_once('TrainerController.php');
$action = $_GET['do'];
if($action != "") {
    //user routes
    if($action == 'showuserLogin') {
        UserController::show_login();
    }
    if($action == 'showuserRegister') {
        UserController::show_register();
    }
    if($action == 'userLogin') {
        $user = new UserController();
        $user->login();
    }
    if($action == 'userLogout') {
        $user = new UserController();
        $user->logout();
    }
    if($action == 'userRegister') {
        $user = new UserController();
        $user->register();
    }
    //doctor routes
    if($action == 'showdoctorLogin') {
        DoctorController::show_login();
    } 
    if($action == 'showdoctorRegister') {
        DoctorController::show_register();
    }
    //admin routes
    if($action == 'showadminLogin') {
        AdminController::show_login();
    }

    //trainer routes
    if($action == 'showtrainerLogin') {
        TrainerController::show_login();
    }
    if($action == 'showtrainerRegister') {
        TrainerController::show_register();
    }
    
    
}