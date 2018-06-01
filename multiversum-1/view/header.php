<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font-awesome   -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
    <title>webshop</title>

    <link rel="stylesheet" href="assets/style.css">

    <link rel="stylesheet" href="assets/menu-style.css">

</head>
<body>

<!--main menu code-->
<div class="menu-header">
    <div class="section">
        <a href="https://www.linkedin.com/in/sutharmayur" id="logo" target="_blank">Multiversum</a>
        <label for="toggle-1" class="toggle-menu">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </label>
        <input type="checkbox" id="toggle-1">
        <nav>
            <ul>
                <li><a href="#home"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#product"><i class="fa fa-product-hunt"></i>Product</a></li>
                <li><a class="contact-page"><i class="fa fa-phone"></i>Contact</a></li>
            </ul>
        </nav>
    </div>
</div>
<script src="view/assets/js/menu-js.js"></script>

<!--ajaxt stukje om paginas te loaden -->
<script type="text/javascript" async>

    // Even heel snel zonder documentatie
    function loadPage(href) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", href, false);
        xmlhttp.send();
        return xmlhttp.responseText;
    }
</script>
<!-- script om inhoud van contactpagina te pakken -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".contact-page").click(function(){
            $("#content").load("contact.php");
        });
    });
</script>




<div class="row">

    <div id="content" class="col-12">

