<?php
class HomeController {

    public static function home() {
        include_once('models/Doctor.php');
        include_once('models/Trainer.php');
        include_once('models/Product.php');
        $doctor = new Doctor();
        $trainer = new Trainer();
        $product = new Product();
        $doctors = $doctor->getDoctors('*','doctors','id');
        $trainers = $trainer->getTrainers('*','trainers','id');
        $products = $product->getProducts('*','products','id');
        return ['doctors'=>$doctors,'trainers'=>$trainers,'products'=>$products];
    }

    static public function show_Doctor($id)
    {
        include_once('../models/Doctor.php');
        include_once('../models/Cases.php');

        $doctor = new Doctor();  
        $cases = new Cases();

        $doctor = $doctor->getDoctor('*','doctors','id',"id ={$id}");
        $cases = $cases->getDoctorsCases('*','cases','id',"doctor_id ={$id}");

        $data =  json_encode(['doctor' => $doctor,'cases' => $cases]);
        header("location: ../doctor_details.php?data={$data}");
    }

    static public function show_Trainer($id)
    {
        include_once('../models/Trainer.php');
        include_once('../models/PreviousWork.php');
        include_once('../models/Product.php');

        $trainer = new Trainer();  
        $works = new PreviousWork();
        $products = new Product();

        $trainer = $trainer->getTrainer('*','trainers','id',"id ={$id}");
        $works = $works->getTrainerWork('*','previous_works','id',"trainer_id ={$id}");
        $products = $products->getTrainerProducts('products.*','products ,trainer_products','products.id',"products.id = trainer_products.product_id AND trainer_products.trainer_id ={$id}");

        $data =  json_encode(['trainer' => $trainer,'previous_works' => $works ,'products'=>$products]);
        header("location: ../trainer_details.php?data={$data}");
    }

    static public function show_Product($id)
    {
        include_once('../models/Product.php');

        $productModel = new Product();  

        $product = $productModel->getProduct('*','products','id',"id ={$id}");
        $reviews = $productModel->getReviews($id);
        $data =  json_encode(['product' => $product,'reviews' => $reviews]);
        header("location: ../product_details.php?data={$data}");
    }
    
    public static function search($input) 
    {
        if(!empty($input))
        {
        include_once('../models/Doctor.php');
        include_once('../models/Trainer.php');
        include_once('../models/Product.php');
        $doctor = new Doctor();
        $trainer = new Trainer();
        $product = new Product();
        
            $doctors = $doctor->getSearchedDoctor('*','doctors','id',"name LIKE '%{$input}%'");
            $trainers = $trainer->getSearchedTrainer('*','trainers','id',"name LIKE '%{$input}%'");
            $products = $product->getSearchedProduct('*','products','id',"name LIKE '%{$input}%'");
            $oldSearch=$input;

            $data = json_encode(['doctors' => $doctors,'trainers' => $trainers ,'products'=>$products ,'oldSearch'=>$oldSearch]);
            header("location: ../search.php?data={$data}");

        }
        else 
        {
            $data = json_encode(['error'=>"Search Empty"]);
            header("location: ../search.php?data={$data}");
         }

    }
    
}



