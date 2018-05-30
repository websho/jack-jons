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





}



?>
