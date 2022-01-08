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

    if($action == 'buyProduct') {
        $id = $_GET['id'];
        UserController::buy_Product($id);
    }

    if($action == 'userPurchases') {
        $user = new UserController();
        $user->showPurchases();
    }
    if($action == 'showUserProfile') {
        $user = new UserController();
        $user->userProfile();
    }
    if($action == 'showUserSettings') {
        $user = new UserController();
        $user->userSettings();
    }
    if($action=='editUser')
    {
        $user = new UserController();
        $user->editUser();
    }

    if($action == "showUserChangePassword")
    {   
        $user = new UserController();
        $user->showChangePassword();
    }

    if($action == "UserchangePass") {
        $user = new UserController();
        $user->changePassword();
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

    if($action == 'showAdminProfile') {
        $user = new AdminController();
        $user->adminProfile();
    }
    if($action == 'showAdminSettings') {
        $user = new AdminController();
        $user->adminSettings();
    }
    if($action=='editAdmin')
    {
        $user = new AdminController();
        $user->editAdmin();
    }

    if($action == "showAdminChangePassword")
    {   
        $user = new AdminController();
        $user->showChangePassword();
    }

    if($action == "AdminchangePass") {
        $user = new AdminController();
        $user->changePassword();
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