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

    //-------------------------doctor routes  doctorLogin-------------------------------



    if($action == 'showdoctorLogin') {
        DoctorController::show_login();
    } 
    if($action == 'showdoctorRegister') {
        DoctorController::show_register();
    }

    if($action == 'doctorLogin') {
        $doctor = new DoctorController();
        $doctor->login();
    }
    if($action == 'doctorLogout') {
        $doctor = new DoctorController();
        $doctor->logout();
    }
    if($action == 'doctorRegister') {
        $doctor = new DoctorController();
        $doctor->register();
    }
    if($action == 'showDoctorProfile') {
        $doctor = new DoctorController();
        $doctor->doctorProfile();
    }
    if($action == 'showDoctorSettings') {
        $doctor = new DoctorController();
        $doctor->doctorSettings();
    }
    if($action=='editDoctor')
    {
        $doctor = new DoctorController();
        $doctor->editDoctor();
    }

    if($action == "showDoctorChangePassword")
    {   
        $doctor = new DoctorController();
        $doctor->showChangePassword();
    }

    if($action == "DoctorchangePass") {
        $doctor = new DoctorController();
        $doctor->changePassword();
    }
//----------------------------------case routes-------------------------------------------
    if($action == "showCases") {
        $doctor = new DoctorController();
        $doctor->getCases();
    }
    
    if($action == "addCase") {
        $doctor = new DoctorController();
        $doctor->addCase();
    }
    if($action == "storeCase") {
        $doctor = new DoctorController();
        $doctor->storeCase();
    }

    if($action == 'editCase') {
        $id = $_GET['id'];
        $doctor = new DoctorController();
        $doctor->editCase($id);
    }
    if($action == "updateCase") {
        $doctor = new DoctorController();
        $doctor->updateCase();
    }

    if($action == 'deleteCase') {
        $id = $_GET['id'];
        $doctor = new DoctorController();
        $doctor->deleteCase($id);
    }
    //-------------------------------------------------------------admin routes----------------------------------
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

    if($action == 'showTrainerProfile') {
        $trainer = new TrainerController();
        $trainer->trainerProfile();
    }
    if($action == 'showTrainerSettings') {
        $trainer = new TrainerController();
        $trainer->trainerSettings();
    }
    if($action=='editTrainer')
    {
        $trainer = new TrainerController();
        $trainer->editTrainer();
    }

    if($action == "showTrainerChangePassword")
    {   
        $trainer = new TrainerController();
        $trainer->showChangePassword();
    }

    if($action == "TrainerchangePass") {
        $trainer = new TrainerController();
        $trainer->changePassword();
    }
    //------------------previouswork------------------------------
    
    if($action == "showWorks") {
        $trainer = new TrainerController();
        $trainer->getWorks();
    }
    
    if($action == "addWork") {
        $trainer = new TrainerController();
        $trainer->addWork();
    }
    if($action == "storeWork") {
        $trainer = new TrainerController();
        $trainer->storeWork();
    }

    if($action == 'editWork') {
        $id = $_GET['id'];
        $trainer = new TrainerController();
        $trainer->editWork($id);
    }
    if($action == "updateWork") {
        $trainer = new TrainerController();
        $trainer->updateWork();
    }

    if($action == 'deleteWork') {
        $id = $_GET['id'];
        $trainer = new TrainerController();
        $trainer->deleteWork($id);
    }
    //------------------------product routes---------------------
    if($action == "showProducts") {
        $trainer = new TrainerController();
        $trainer->getProducts();
    }
    
    if($action == "addProduct") {
        $trainer = new TrainerController();
        $trainer->addProduct();
    }
    if($action == "storeProduct") {
        $trainer = new TrainerController();
        $trainer->storeProduct();
    }

    if($action == 'editProduct') {
        $id = $_GET['id'];
        $trainer = new TrainerController();
        $trainer->editProduct($id);
    }
    if($action == "updateProduct") {
        $trainer = new TrainerController();
        $trainer->updateProduct();
    }

    if($action == 'deleteProduct') {
        $id = $_GET['id'];
        $trainer = new TrainerController();
        $trainer->deleteProduct($id);
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