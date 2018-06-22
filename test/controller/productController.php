<?php

require_once 'model/productLogic.php';


class productController{

    public function __construct() {

        $this->productLogic = new productLogic();

    }


    public function __destruct() {

    }




    public function handleRequest () {


        try {



            switch ($_GET['op']) {


                case "producten":

                    $this->CollectDisplayProducten();
                    break;

                case "admin":

                    $this->CollectCreateProduct();
                    break;

                case "home-producten":

                    $this->CollectDisplayHomeProducten();
                    break;

                case "details":

                   $this->CollectDisplayProductDetails();
                    break;
                    
                case "search":
                    
                    $this->CollectDisplaySearchResult();
                    break;

                default:
                    $this->CollectDisplayHomeProducten();


            }

        }
        catch (Exception $e) {
            throw $e;
        }

    }



    public function CollectCreateProduct() {


        if (isset($_POST["create"])){

            $target = basename($_FILES['foto']['name']);
            $tmpname = $_FILES['foto']['tmp_name'];
            $folder_dir = "view/images/".$target;
            move_uploaded_file($tmpname, $folder_dir);

            $naam = $_POST["naam"];
            $prijs = $_POST["prijs"];
            $geschikt = $_POST["geschikt"];
            $specificaties = $_POST["specificaties"];
            $foto = $folder_dir;
            $product = $this->productLogic->CreateProduct($naam, $prijs, $geschikt, $specificaties, $foto);

        }else{

            include "view/admin.php";
        }
    }




    public function CollectHomeProducten() {

        $product = $this->productLogic->HomeProducten();
        include "view/product.php";

        $product = implode(" ",$product);


    }





    public function CollectDisplayHomeProducten(){

        $product = $this->productLogic->DisplayHomeProduct();

        include 'view/product.php';


    }


    public function CollectReadAllProduct(){

        $product = $this->productLogic->ReadAllProduct();

        include 'view/product.php';

    }





    public function CollectDisplayProducten(){


        $product = $this->productLogic->DisplayProducten();

        include 'view/product.php';

    }





    public function CollectReadPerProduct(){

        $id = $_GET['id'];
        $product = $this->productLogic->ReadPerProduct($id);
        $product = implode(" ",$product);
        include 'view/product.php';

    }




    public function CollectDisplayProductDetails(){
        $id = $_GET['id'];
        $product = $this->productLogic->DisplayProductDetails($id);
        include 'view/product.php';

    }


    public function CollectDisplaySearchResult(){
                
        if (isset($_POST["name"])){
            $name = $_POST['name'];
            $product = $this->productLogic->DisplaySearchProduct($name);
//            $product = implode(" ",$product);
            include 'view/product.php';
            
        }else{
            echo "Error: zoek Probleem.";
            include "view/product.php";
        }
        
        
    }


}



?>