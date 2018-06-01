<?php

require_once 'DataHandler.php';


class productLogic {


    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "root", "", "vr_brillen");
    }


    public function __destruct() {

    }


  public function CreateProduct($naam, $prijs, $geschikt, $specificaties, $foto){

      $msg = "";

        try{


            $sql = "INSERT INTO `vr_brillen`.`producten` (`naam`, `prijs`, `geschikt`, `specificaties`, `foto`) VALUES ('$naam', '$prijs', '$geschikt', '$specificaties', '$foto');";

            $stmt = $this->DataHandler->Create($sql);






        }catch (Exception $e){
            throw $e;
        }


  }

    public function DeleteProduct($id) {

        $sql = "DELETE FROM `vr_brillen`.`producten` WHERE id = '$id'";
        $stmt = $this->DataHandler->Delete($sql);
        return $stmt;

    }




    public function ReadProduct($id){

        $sql = "SELECT * FROM `vr_brillen`.`producten` WHERE id = '$id'";
        $stmt = $this->DataHandler->ReadData($sql);
        return $stmt;


    }


}


?>

