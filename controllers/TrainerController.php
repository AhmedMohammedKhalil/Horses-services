<?php
include_once ('../models/Trainer.php');
class TrainerController {

   

    public static function show_login($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'login.php');
    }

    public static function show_register($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'register.php');
    }

    public function login($trainerroute = '../trainer/') 
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
                    header('Location: '.$trainerroute."login.php?error={$error}&data={$encoded}");
                    exit();
                }
                $data = [$email,$password];
                $trainer = new Trainer();
                $trainer->select($data);

            }
        }
        
    }

    public function logout()
    {
        unset($_SESSION['trainer']);
        unset($_SESSION['type']);
        unset($_SESSION['username']);
        header('location:../index.php');
    }

    public function register()
    { 
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['register'])) {
                $name=trim($_POST['name']);
                $email = trim($_POST['email']);
                $specialization = trim($_POST['specialization']);
                $phone = trim($_POST['phone']);
                $address = trim($_POST['address']);
                $description = trim($_POST['description']);
                $recommendation = trim($_POST['recommendation']);
                $password = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_password']);
                $encoded= json_encode(['email'=>$email ,'name'=>$name,'specialization'=>$specialization ,'phone'=>$phone , 'address'=>$address,'description'=>$description,'recommendation'=>$recommendation]);
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
                if (empty($phone) || strlen($phone)<6 || !is_numeric($phone)) {
                    if(empty($phone))
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
                    header("location: ../trainer/register.php?error={$error}&data={$encoded} " );
                    exit();
                }
                $data = [$name,$email,$password,$confirm_password,$specialization,$phone,$address,$description,$recommendation];
                $trainer = new Trainer();
                $trainer->add($data);

            }
        }

    }

    public function trainerProfile()
    {
        include_once('../models/Trainer.php');
        
        $trainer_id=$_SESSION['trainer']['id'];
        $trainer = new Trainer();  
        $trainer = $trainer->getTrainer('*','trainers','id',"id ={$trainer_id}");
        $data =  json_encode(['trainer' => $trainer]);
        header("location: ../trainer/profile.php?data={$data}");
    }
    public function trainerSettings ($trainerroute = '../trainer/')
    {
        header('Location: '.$trainerroute.'settings.php');
    }

    public function editTrainer($trainerroute = '../trainer/')
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {  if(isset($_POST['trainerEdit'])) 
            {
            $name=trim($_POST['name']);
            $email = trim($_POST['email']);
            $specialization = trim($_POST['specialization']);
            $phone = trim($_POST['phone']);
            $address=trim($_POST['address']);
            $description=trim($_POST['description']);
            $photoName = $_FILES['photo']['name'];
            if(!empty($photoName)) {
                $photoSize = $_FILES['photo']['size'];
                $photoTmp	= $_FILES['photo']['tmp_name'];
                $photoAllowedExtension = array("jpeg", "jpg", "png");
                $explode = explode('.', $photoName);
                $photoExtension = strtolower(end($explode));
            }
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
            if (! empty($photoName) && $photoSize > 4194304) {
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
                if(empty($phone))
                {
                    array_push($error,"phone required");
                }
                else if(strlen($phone)<6)
                {
                    array_push($error,"Must be 6 digit");
                }
                else{
                    array_push($error,"phone number contains numbers only");
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
                header("location: {$trainerroute}settings.php?errors={$error}&data={$encoded}" );
                exit();
            }
            $trainer_id = $_SESSION['trainer']['id'];
            $oldphoto = $_SESSION['trainer']['photo'];
            if(!empty($photoName)) {
                $path = '../files/trainers/'.$trainer_id;
                if(!is_dir($path)) {
                    mkdir($path);
                } 
                if($oldphoto != null) {
                    unlink($path.'/'.$oldphoto);
                }
                move_uploaded_file($photoTmp, '../files/trainers/'.$trainer_id.'/'. $photoName);
            }

            $trainer = new Trainer();
            $photo = !empty($photoName) ? $photoName : $oldphoto;
            $success = $trainer->update($trainer_id,$data,$photo);
            if($success) {
                $_SESSION['trainer']['name'] = $name;
                $_SESSION['username'] = $name;
                $_SESSION['trainer']['email'] = $email;
                $_SESSION['trainer']['specialization'] = $specialization;
                $_SESSION['trainer']['address'] = $address;
                $_SESSION['trainer']['phone'] = $phone;
                $_SESSION['trainer']['description'] = $description;
                $_SESSION['trainer']['photo'] = $photo;
                header('Location: Controller.php?do=showTrainerProfile'); 
            }

        }
        }
    }

    public function showChangePassword ($trainerroute = '../trainer/') 
    {
        header('Location: '.$trainerroute.'changepassword.php');
    }
    public function changePassword ($trainerroute = '../trainer/') 
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
                    header("location: {$trainerroute}changepassword.php?errors={$error}" );
                    exit();
                }
                $trainer = new Trainer();
                $trainer_id = $_SESSION['trainer']['id'];
                $success = $trainer->changePassword($trainer_id,$data);
                if($success) {
                    $_SESSION['trainer']['password'] = password_hash($password, PASSWORD_BCRYPT);
                    header('Location: Controller.php?do=showTrainerProfile'); 
                }

            }
        }
        
    }

    //for Previous Work

    public function getWorks()
    {
        include_once('../models/PreviousWork.php');
        $trainer_id=$_SESSION['trainer']['id'];
        $works = new PreviousWork();

        $works = $works->getTrainerWorks('*','previous_works','id',"trainer_id ={$trainer_id}");

        $data =  json_encode(['works' => $works]);
        header("location: ../trainer/trainerworks.php?data={$data}");
    }
    public function addWork($trainerroute = '../trainer/') {
        header('Location: '.$trainerroute.'addwork.php');
    }
    public function editWork($id) 
    {
        include_once('../models/PreviousWork.php');
        $work = new PreviousWork();
        $work = json_encode($work->getWork($id));
        header("location: ../trainer/editwork.php?work={$work}" );
    }

    public function storeWork($trainerroute = '../trainer/')
    {
        include_once('../models/PreviousWork.php');
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['add_work'])) {
                $job_title=trim($_POST['job_title']);
                $placement = trim($_POST['placement']);
                $details = trim($_POST['details']);
                $job_estimation = trim($_POST['job_estimation']);
                $trainer_id=$_SESSION['trainer']['id']; 
                $encoded= json_encode(['job_title'=>$job_title ,'placement'=>$placement,'details'=>$details ,'job_estimation'=>$job_estimation,'trainer_id'=>$trainer_id]);
                $error=[];
                if (empty($job_title)) {
                    array_push($error,"job_title required");
                } 
                if (empty($placement)) {
                    array_push($error,"placement required");
                } 
                if (empty($details)) {
                    array_push($error,"details required");
                } 
                if (empty($job_estimation)) {
                    array_push($error,"job_estimation required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../trainer/addwork.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$job_title,$placement,$details,$job_estimation,$trainer_id];
                $work = new PreviousWork();
                $work->add($data);
            }
        }   
    }
    public function updateWork($trainerroute = '../trainer/') 
    {
        include_once('../models/PreviousWork.php');
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['edit_work'])) {
                $job_title=trim($_POST['job_title']);
                $placement = trim($_POST['placement']);
                $details = trim($_POST['details']);
                $job_estimation = trim($_POST['job_estimation']);
                $trainer_id=$_SESSION['trainer']['id'];  
                $work_id= trim($_POST['work_id']);
                $encoded= json_encode(['job_title'=>$job_title ,'placement'=>$placement,'details'=>$details ,'job_estimation'=>$job_estimation]);
                $error=[];
                if (empty($job_title)) {
                    array_push($error,"job_title required");
                } 
                if (empty($placement)) {
                    array_push($error,"placement required");
                } 
                if (empty($details)) {
                    array_push($error,"details required");
                } 
                if (empty($job_estimation)) {
                    array_push($error,"job_estimation required");
                } 
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../trainer/addwork.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$job_title,$placement,$details,$job_estimation,$work_id];
                $work = new PreviousWork();
                $work->update($data);
                header('Location: Controller.php?do=showWorks'); 
            }
        }   
    }
    public function deleteWork($id)
    {
        include_once('../models/PreviousWork.php');
        $work = new PreviousWork();
        $work->delete($id);
        header('Location: Controller.php?do=showWorks'); 
    }


    //for Products
    public function getProducts()
    {
        include_once('../models/Product.php');
        $trainer_id=$_SESSION['trainer']['id'];
        $products = new Product();
        $products = $products->getTProducts($trainer_id);
        $data =  json_encode(['products' => $products]);
        header("location: ../trainer/trainerproducts.php?data={$data}");
    }
    public function addProduct($trainerroute = '../trainer/') 
    {
        header('Location: '.$trainerroute.'addproduct.php');
    }

    public function storeProduct($trainerroute = '../trainer/')
    {
        include_once('../models/Product.php');
        $error=[];
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['add_product'])) {
                $category=trim($_POST['category']);
                $details = trim($_POST['details']);
                $name = trim($_POST['name']);
                $price = trim($_POST['price']);
                $trainer_id=$_SESSION['trainer']['id'];
                $photoName = $_FILES['photo']['name'];
                $photoSize = $_FILES['photo']['size'];
                $photoTmp	= $_FILES['photo']['tmp_name'];
                $photoAllowedExtension = array("jpeg", "jpg", "png");
                $explode = explode('.', $photoName);
                $photoExtension = strtolower(end($explode));
                $encoded= json_encode(['category'=>$category ,'details'=>$details,'name'=>$name ,'price'=>$price,'trainer_id'=>$trainer_id]);
                $error=[];
                if (! empty($photoName) && ! in_array($photoExtension, $photoAllowedExtension)) {
                    $error[] = 'This Extension Is Not <strong>Allowed</strong>';
                }
                if (! empty($photoName) && $photoSize > 4194304) {
                    $error[] = 'photo Cant Be Larger Than <strong>4MB</strong>';
                }
                if (empty($category)) {
                    array_push($error,"category required");
                } 
                if (empty($details)) {
                    array_push($error,"details required");
                } 
                if (empty($name)) {
                    array_push($error,"name required");
                } 
                if (empty($price)) {
                    array_push($error,"price required");
                }
                if(!empty($error))
                {
                    $error=json_encode($error);
                    header("location: ../trainer/addproduct.php?error={$error}&data={$encoded}" );
                    exit();
                }
                $data = [$category,$details,$name,$price];
                $product = new Product();
                $id= $product->add($data,$photoName,$trainer_id);
                if(!empty($photoName))
                {
                    $path = '../files/products/'.$id;
                    if(!is_dir($path)) 
                    {
                        mkdir($path);
                    } 
                }
                move_uploaded_file($photoTmp, '../files/products/'.$id.'/'. $photoName);
                $this->getProducts();
            }
        }   
    }
     public function editProduct($id) 
    {
        include_once('../models/Product.php');
        $product = new Product();
        $product = json_encode($product->getProduct('*','products','id',"id ={$id}"));
        header("location: ../trainer/editproduct.php?product={$product}" );
    }
    public function updateProduct($trainerroute = '../trainer/') 
    {
        include_once('../models/Product.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {  if(isset($_POST['update_product'])) 
            {
            $category=trim($_POST['category']);
            $details = trim($_POST['details']);
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $product_id=trim($_POST['product_id']);
            $photoName = $_FILES['photo']['name'];
            if(!empty($photoName)) {
                $photoSize = $_FILES['photo']['size'];
                $photoTmp	= $_FILES['photo']['tmp_name'];
                $photoAllowedExtension = array("jpeg", "jpg", "png");
                $explode = explode('.', $photoName);
                $photoExtension = strtolower(end($explode));
            }
            $data = [
                'category'=>$category,
                'details'=>$details,
                'name'=>$name,
                'price'=>$price,
                'id'=>$product_id
            ];
            $encoded= json_encode($data);
            $error=[];

            if (! empty($photoName) && ! in_array($photoExtension, $photoAllowedExtension)) {
                $error[] = 'This Extension Is Not <strong>Allowed</strong>';
            }
            if (! empty($photoName) && $photoSize > 4194304) {
                $error[] = 'photo Cant Be Larger Than <strong>4MB</strong>';
            }
            if (empty($category)) {
                array_push($error,"category required");
            } 
            if (empty($details)) {
                array_push($error,"details required");
            } 
            if (empty($name)) {
                array_push($error,"name required");
            } 
            if (empty($price)) {
                array_push($error,"price required");
            } 
            if(!empty($error))
            {
                $error=json_encode($error);
                header("location: {$trainerroute}settings.php?errors={$error}&data={$encoded}" );
                exit();
            }
            $product = new Product();
            $product_model=$product->getProduct('*','products','id',"id ={$product_id}");
            $oldphoto=$product_model[0]['photo'];
            if(!empty($photoName)) {
                $path = '../files/products/'.$product_id;
                if(!is_dir($path)) {
                    mkdir($path);
                } 
                if($oldphoto != null) {
                    unlink($path.'/'.$oldphoto);
                }
                move_uploaded_file($photoTmp, '../files/products/'.$product_id.'/'. $photoName);
            }

           
            $photo = !empty($photoName) ? $photoName : $oldphoto;
            $success = $product->update($data,$photo);
            if($success) {
                $this->getProducts();
            }

        }
        }
    }

    public function deleteProduct($id)
    {
        include_once('../models/Product.php');
        $product = new Product();
        $product->delete($id);
        $this->getProducts();
    }
}