<?php


require_once 'model/productLogic.php';


class productController{

    public function __construct() {

        $this->productLogic = new productLogic();

    }


    public function __destruct() {

    }


// vanaf hier verder gaan



    public function handleRequest () {


        try {



            switch ($_GET['op']) {

                case "create":

                    $this->CollectCreateProduct();
                    break;

                case "read":
                    $this->CollectReadProduct();
                    break;


                case "delete":
                    $this->CollectDeleteProduct();
                    break;

                case "tabel":
                    $this->CollectDisplayProductTabel();
                    break;

                default:
                    $this->CollectReadAllProduct();

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


    public function CollectDeleteProduct() {

        $id = $_GET['id'];
        $product = $this->productLogic->DeleteProduct($id);
    }




    public function CollectReadProduct(){

        $id = $_GET['id'];
        $product = $this->productLogic->ReadProduct($id);

        $product = implode(" ",$product);
        include 'view/product.php';

    }





}



?>
