<?php

require_once 'DataHandler.php';


class productLogic {


    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "root", "", "vr_brillen");
    }


    public function __destruct() {

    }




    // vanaf hier verder gaan


}


?>

