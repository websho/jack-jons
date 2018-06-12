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


        try{


            $sql = "INSERT INTO `vr_brillen`.`producten` (`naam`, `prijs`, `geschikt`, `specificaties`, `foto`) VALUES ('$naam', '$prijs', '$geschikt', '$specificaties', '$foto');";

            $stmt = $this->DataHandler->Create($sql);


        }catch (Exception $e){
            throw $e;
        }


    }



// ReadAllProduct() method leest alle gegevens van alle producten uit database

    public function ReadAllProduct(){

        try{

            $sql = "SELECT * FROM `vr_brillen`.`producten`";
            $stmt = $this->DataHandler->ReadAllData($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }



// HomeProducten() method, leest producten die in aanbiding zijn uit database
    public function HomeProducten(){


        try{

//            $sql = "SELECT * FROM `producten` WHERE Prijs BETWEEN 40 AND 600 LIMIT 9";
            $sql ="SELECT * FROM `producten` WHERE aanbieding = 'ja' ORDER BY RAND() LIMIT 9";

            $stmt = $this->DataHandler->ReadHomeProduct($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }



// ReadperProduct($id) method haalt een product met een specifiek id uit database
    public  function ReadPerProduct($id){


            $sql = "SELECT * FROM `vr_brillen`.`producten` WHERE id = $id";
            $stmt = $this->DataHandler->ReadDataDetails($sql);

            return $stmt;



    }



    //met DisplayHomeProduct() method haal ik alle producten uit HomeProducten() method in een array en print ik ze in een card view met drie specificatie (naam, image, prijs)
    public function DisplayHomeProduct(){


        $array = $this->HomeProducten();

    $html = "<div class='row'>";

        foreach ($array as $k => $v){


            $html .= "<div class='col-4' id='cardbody'>";
            $html .= "<div class='card' style='width: 18rem;'>";

            $naam = $v["naam"];
            $image = $v["foto"];
            $prijs = $v["prijs"];
            $id = $v["id"];
            $html .= "<img class='card-img-top' src='$image' alt='Card image cap'>";


            $html .= "<div class='card-body'>";

            $html .= "<ul class='list-group list-group-flush'>";
            $html .= " <li class='list-group-item'><h5 class='card-title'>$naam</h5></li>";

            $html .= "<li class='list-group-item'><p class='card-text'>$prijs €</p></li>";

            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id' class='btn btn-primary'>Details</a><a id='bestel'href='#' class='btn btn-primary'>Bestelen</a>
</li>";

            $html .= "</ul>";
            $html .="</div>";
            $html .= "</div>";
            $html .= "</div>";
        }

    $html .= "</div>";

        return $html;


    }



//met Display Producten() method haal ik alle producten uit ReadAllProduct() method in een array en print ik ze in een card view met drie specificatie (naam, image, prijs)
    public function DisplayProducten(){

        $array = $this->ReadAllProduct();

        $html = "<div class='row'>";

        foreach ($array as $k => $v){
            $html .= "<div id='cardbody'  class='col-4'>";
            $html .= "<div class='card' style='width: 18rem;'>";

            $naam = $v["naam"];
            $image = $v["foto"];
            $prijs = $v["prijs"];
            $id = $v["id"];

            $html .= "<img class='card-img-top' src='$image' alt='Card image cap'>";

            $html .= "<div class='card-body'>";
            $html .= "<ul class='list-group list-group-flush'>";
            $html .= " <li class='list-group-item'><h5 class='card-title'>$naam</h5></li>";

            $html .= "<li class='list-group-item'><p class='card-text'>$prijs €</p></li>";

            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id' class='btn btn-primary'>Details</a><a id='bestel'href='#' class='btn btn-primary'>Bestelen</a>
</li>";

            $html .= "</ul>";
            $html .="</div>";
            $html .= "</div>";
            $html .= "</div>";
        }

        $html .= "</div>";

        return $html;

    }




    public function DisplayProductDetails($id){

        $array = $this->ReadPerProduct($id);
//            var_dump($array);

            $naam = $array['naam'];
            $image = $array["foto"];
            $prijs = $array["prijs"];
            $geschikt = $array["geschikt"];
            $specificatie = $array["specificaties"];
            $aanbieding = $array["aanbieding"];

        $html = '<div class="card" style="width: 25rem; margin-left: 33%;">';

            $html .= "<img class='card-img-top' src= '$image' alt='Card image cap''>";

            $html .= "<div class='card-body'>";
                $html .=  "<h5 class='card-title'>$naam</h5>";
                $html .= "<p class='card-text'>$specificatie</p>";
            $html .= '</div>';

                $html .= "<ul class='list-group list-group-flush'>";
                    $html .= "<li class='list-group-item'>Geschikt voor: $geschikt</li>";
                    $html .= "<li class='list-group-item'>Prijs: $prijs €</li>";
                    $html .= "<li class='list-group-item'>In aanbieding: $aanbieding</li>";
                $html .= "</ul>";

                $html .= "<div class='card-body'>";
                    $html .= "<a href='index.php?op=producten' class='card-link'>Naar producten</a>";
                    $html .= "<a href='#' class='card-link'>Bestellen</a>";
                $html .= "</div>";

        $html .= "</div>";
;



        return $html;
    }


}


?>