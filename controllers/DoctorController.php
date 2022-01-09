<?php
include_once ('../models/Doctor.php');
class DoctorController {

    

    public static function show_login($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'login.php');
    }

    public static function show_register($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'register.php');
    }

    public function login($docotorroute = '../doctor/') 
    {
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $data = [$email,$password];
               $encoded= json_encode(['email'=>$email]);
                if (empty($email)) {
                    $emailError="email required";
                }
                if (empty($password)) {
                    $passwordError="password required";
                } 
                if (strlen($password)>0 && strlen($password)<8) {
                    $passwordError="password must be greater than 8 digit";
                } 
                if(isset($emailError) || isset($passwordError)) 
                {
                    $error = json_encode([
                        'email_error'=> isset($emailError) ? $emailError : '',
                        'password_error'=>isset($passwordError) ? $passwordError : ''
                    ]);
                    header('Location: '.$docotorroute."login.php?error={$error}&data={$encoded}");
                    exit();
                }
                $data = [$email,$password];
                $doctor = new Doctor();
                $doctor->select($data);

            }
        }
        
    }

    public function logout()
    {
        unset($_SESSION['doctor']);
        unset($_SESSION['type']);
        unset($_SESSION['username']);
        header('location:../index.php');
    }

    public function register($docotorroute = '../doctor/')
    { 
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['register'])) {
                $name=trim($_POST['name']);
                $email = trim($_POST['email']);
                $specialization = trim($_POST['specialization']);
                $mobile = trim($_POST['mobile']);
                $address = trim($_POST['address']);
                $description = trim($_POST['description']);
                $password = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_password']);
                $encoded= json_encode(['email'=>$email ,'name'=>$name,'specialization'=>$specialization ,'mobile'=>$mobile , 'address'=>$address,'description'=>$description]);
                $error=[];
                if (empty($name)) {
                    array_push($error,"name required");
                } 
                if (empty($email)) {
                    array_push($error,"email required");
                } 
                if (empty($specialization)) {
                    array_push($error,"specialization required");
                } 
                if (empty($mobile) || strlen($mobile)<6 || !is_numeric($mobile)) {
                    if(empty($mobile))
                    {
                        array_push($error,"mobile required");
                    }
                    else if(strlen($mobile)<6)
                    {
                        array_push($error,"Must be 6 digit");
                    }
                    else{
                        array_push($error,"mobile number contains numbers only");
                    }
                } 
                if (empty($password)) {
                    array_push($error,"password requires");
                } 
                if (strlen($password)>0 && strlen($password)<8) {
                    array_push($error,"this password less than 8 digit");
                } 
                if (empty($confirm_password)) {
                    array_push($error,"confirm_password requires");
                } 
                if ($password!=$confirm_password) {
                    array_push($error,"passwords not matched");
                } 
                if (empty($address)) {
                    array_push($error,"address required");
                } 
                if (empty($description)) {
                    array_push($error,"description required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../doctor/register.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$name,$email,$password,$confirm_password,$specialization,$mobile,$address,$description];
                $doctor = new Doctor();
                $doctor->add($data);

            }
        }

    }

    public function doctorProfile()
    {
        include_once('../models/Doctor.php');
        
        $doctor_id=$_SESSION['doctor']['id'];
        $doctor = new Doctor();  
        $doctor = $doctor->getDoctor('*','doctors','id',"id ={$doctor_id}");
        $data =  json_encode(['doctor' => $doctor]);
        header("location: ../doctor/profile.php?data={$data}");
    }
    public function doctorSettings ($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'settings.php');
    }

    public function editDoctor($docotorroute = '../doctor/')
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {  if(isset($_POST['doctorEdit'])) 
            {
            $name=trim($_POST['name']);
            $email = trim($_POST['email']);
            $specialization = trim($_POST['specialization']);
            $phone = trim($_POST['phone']);
            $address=trim($_POST['address']);
            $description=trim($_POST['description']);
            $photoName = $_FILES['photo']['name'];
            $photoSize = $_FILES['photo']['size'];
            $photoTmp	= $_FILES['photo']['tmp_name'];
            $photoAllowedExtension = array("jpeg", "jpg", "png");
            $explode = explode('.', $photoName);
            $photoExtension = strtolower(end($explode));
            $data = [
                'email'=>$email,
                'name'=>$name,
                'specialization'=>$specialization,
                'phone'=>$phone,
                'address'=>$address,
                'description'=>$description
            ];
            $encoded= json_encode($data);
            $error=[];

            if (! empty($photoName) && ! in_array($photoExtension, $photoAllowedExtension)) {
                $error[] = 'This Extension Is Not <strong>Allowed</strong>';
            }
            if ($photoSize > 4194304) {
                $error[] = 'photo Cant Be Larger Than <strong>4MB</strong>';
            }
            if (empty($name)) {
                array_push($error,"name required");
            } 
            if (empty($email)) {
                array_push($error,"email required");
            } 
            if (empty($specialization)) {
                array_push($error,"specialization required");
            } 
            if (empty($phone) || strlen($phone)<6 || !is_numeric($phone)) 
            {
                if(empty($mobile))
                {
                    array_push($error,"mobile required");
                }
                else if(strlen($phone)<6)
                {
                    array_push($error,"Must be 6 digit");
                }
                else{
                    array_push($error,"mobile number contains numbers only");
                }
            } 
            if (empty($address)) {
                array_push($error,"address required");
            } 
            if (empty($description)) {
                array_push($error,"description required");
            }  
            if(!empty($error))
            {
                $error=json_encode($error);
                header("location: {$docotorroute}settings.php?errors={$error}&data={$encoded}" );
                exit();
            }
            $doctor_id = $_SESSION['doctor']['id'];
                $oldphoto = $_SESSION['doctor']['photo'];
                $path = '../files/doctors/'.$doctor_id;
            if(!is_dir($path)) {
                mkdir($path);
            } 
            if($oldphoto != null) {
                unlink($path.'/'.$oldphoto);
            }
            move_uploaded_file($photoTmp, '../files/doctors/'.$doctor_id.'/'. $photoName);

            $doctor = new Doctor();
            $success = $doctor->update($doctor_id,$data,$photoName);
            if($success) {
                $_SESSION['doctor']['name'] = $name;
                $_SESSION['username'] = $name;
                $_SESSION['doctor']['email'] = $email;
                $_SESSION['doctor']['specialization'] = $specialization;
                $_SESSION['doctor']['address'] = $address;
                $_SESSION['doctor']['phone'] = $phone;
                $_SESSION['doctor']['description'] = $description;
                $_SESSION['doctor']['photo'] = $photoName;
                header('Location: Controller.php?do=showDoctorProfile'); 
            }

        }
        }
    }

    public function showChangePassword ($docotorroute = '../doctor/') 
    {
        header('Location: '.$docotorroute.'changepassword.php');
    }
    public function changePassword ($docotorroute = '../doctor/') 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        { 
            if(isset($_POST['change_password'])) {
                $password = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_passowrd']);
                $data = [
                    'password' => $password
                ];
                $error=[];
                if(strlen($password)<8) {
                    array_push($error,"please enter password greater than 8 digits");
                } 
                if ($password!=$confirm_password) {
                    array_push($error,"passwords not matched");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: {$docotorroute}changepassword.php?errors={$error}" );
                    exit();
                }
                $doctor = new Doctor();
                $doctor_id = $_SESSION['doctor']['id'];
                $success = $doctor->changePassword($doctor_id,$data);
                if($success) {
                    $_SESSION['doctor']['password'] = password_hash($password, PASSWORD_BCRYPT);
                    header('Location: Controller.php?do=showDoctorProfile'); 
                }

            }
        }
        
    }

    public function getCases()
    {
        include_once('../models/Cases.php');
        $doctor_id=$_SESSION['doctor']['id'];
        $cases = new Cases();

        $cases = $cases->getDoctorsCases('*','cases','id',"doctor_id ={$doctor_id}");

        $data =  json_encode(['cases' => $cases]);
        header("location: ../doctor/doctorcases.php?data={$data}");
    }
    public function addCase($docotorroute = '../doctor/') {
        header('Location: '.$docotorroute.'addcase.php');
    }
    public function editCase($id) 
    {
        include_once('../models/Cases.php');
        $case = new Cases();
        $case = json_encode($case->getCase($id));
        header("location: ../doctor/editcase.php?case={$case}" );
    }

    public function storeCase($docotorroute = '../doctor/')
    {
        include_once('../models/Cases.php');
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['add_case'])) {
                $title=trim($_POST['title']);
                $details = trim($_POST['details']);
                $treatment = trim($_POST['treatment']);
                $doctor_id=$_SESSION['doctor']['id']; 
                $encoded= json_encode(['title'=>$title ,'details'=>$details,'treatment'=>$treatment ,'doctor_id'=>$doctor_id]);
                $error=[];
                if (empty($title)) {
                    array_push($error,"title required");
                } 
                if (empty($details)) {
                    array_push($error,"details required");
                } 
                if (empty($treatment)) {
                    array_push($error,"treatment required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../doctor/addcase.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$title,$details,$treatment,$doctor_id];
                $case = new Cases();
                $case->add($data);
            }
        }   
    }
    public function updateCase($docotorroute = '../doctor/') 
    {
        include_once('../models/Cases.php');
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['edit_case'])) {
                $title=trim($_POST['title']);
                $details = trim($_POST['details']);
                $treatment = trim($_POST['treatment']);
                $doctor_id=$_SESSION['doctor']['id']; 
                $case_id= trim($_POST['case_id']);
                $encoded= json_encode(['title'=>$title ,'details'=>$details,'treatment'=>$treatment]);
                $error=[];
                if (empty($title)) {
                    array_push($error,"title required");
                } 
                if (empty($details)) {
                    array_push($error,"details required");
                } 
                if (empty($treatment)) {
                    array_push($error,"treatment required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../doctor/editcase.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$title,$details,$treatment,$case_id];
                $case = new Cases();
                $case->update($data);
                header('Location: Controller.php?do=showCases'); 
            }
        }   
    }
    public function deleteCase($id)
    {
        include_once('../models/Cases.php');
        $case = new Cases();
        $case->delete($id);
        header('Location: Controller.php?do=showCases'); 
    }
}