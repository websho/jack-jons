<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font-awesome   -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/style.css">

</head>
<body>

<div class="col-12 contact-box">

    <div class="col-12 titel-box">

    <div class="bedrijf-naam"><b>Multiversum</b></div>

    <div class="titel">Neem contact met Multiversum</div>

    </div>

    <div class="col-12 social-media">

        <div class="fas fa-envelope fa-2x icon-box"><br/>
           <span class="info-text">Email</span><br/>
            <span class="info-text">Email@email.nl</span><br/>
        </div>

        <div class="fab fa-facebook-square fa-2x icon-box"><br/>
            <span class="info-text">Facebook</span><br/>
            <span class="info-text">www.Facebook</span>
        </div>

        <div class="fab fa-instagram fa-2x icon-box"><br/>
            <span class="info-text">Instagram</span><br/>
            <span class="info-text">#multiversum</span>
        </div>

        <div class="fas fa-phone-square fa-2x icon-box"><br/>
            <span class="info-text">Phone</span><br/>
            <span class="info-text">+1 333 1234567</span>
            </div>

        <div class="fab fa-skype fa-2x icon-box"><br/>
            <span class="info-text">Skype</span><br/>
            <span class="info-text">#multiversum</span>

        </div>

    </div>

    <div class="adres-titel">Ons Adres</div>

    <div class="col-12 map">

         <!--The div element for the map -->
        <div id="googleMap"></div>
        <script>
            function myMap() {
                var mapProp= {
                    center:new google.maps.LatLng(51.508742,-0.120850),
                    zoom:5,
                };
                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
        <!--
        To use this code on your website, get a free API key from Google.
        Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
        -->
    </div>


</div>

</body>
</html>