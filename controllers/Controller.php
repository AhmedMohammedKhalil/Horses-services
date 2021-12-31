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
    //doctor routes  doctorLogin
    if($action == 'showdoctorLogin') {
        DoctorController::show_login();
    } 
    if($action == 'showdoctorRegister') {
        DoctorController::show_register();
    }

    if($action == 'doctorLogin') {
        $user = new DoctorController();
        $user->login();
    }
    if($action == 'doctorLogout') {
        $user = new DoctorController();
        $user->logout();
    }
    if($action == 'doctorRegister') {
        $user = new DoctorController();
        $user->register();
    }
    //admin routes
    if($action == 'showadminLogin') {
        AdminController::show_login();
    }
    if($action == 'adminLogin') {
        $trainer = new AdminController();
        $trainer->login();
    }
    if($action == 'adminLogout') {
        $admin = new AdminController();
        $admin->logout();
    }

    //trainer routes
    if($action == 'showtrainerLogin') {
        TrainerController::show_login();
    }
    if($action == 'showtrainerRegister') {
        TrainerController::show_register();
    }
    if($action == 'trainerLogin') {
        $trainer = new TrainerController();
        $trainer->login();
    }
    if($action == 'trainerLogout') {
        $trainer = new TrainerController();
        $trainer->logout();
    }
    if($action == 'trainerRegister') {
        $trainer = new TrainerController();
        $trainer->register();
    }
    //home routes
    if($action == 'showDoctor') {
        $id = $_GET['id'];
        HomeController::show_Doctor($id);
    }
    if($action == 'showTrainer') {
        $id = $_GET['id'];
        HomeController::show_Trainer($id);
    }
    if($action == 'showProduct') {
        $id = $_GET['id'];
        HomeController::show_Product($id);
    }
    if($action == 'makesearch') {
        $search = $_POST['search'];
        HomeController::search($search);
    }
}