<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Prueba Bootstrap</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 70px;" >

<?php require('templates/menu.php'); ?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!--<div class="item">
            <img src="img/hm1.png" alt="Logo">
            <div class="carousel-caption">
                <h3>Logo</h3>
                <p>Hola Mundo</p>
            </div>
            
        </div>

        <div class="item">
            <img src="img/hm2.png" alt="Banner">
            <div class="carousel-caption">
                <h3>Banner</h3>
                <p>De Hola Mundo</p>
            </div>
        </div> -->

        <div class="item active">
            <img src="img/banner/WD-PURPLE.jpg" alt="WD">
        </div>

        <div class="item">
            <img src="img/banner/GIGABYTE-MOTHERS.jpg" alt="Gigabyte">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  </div> <!-- Fin SLIDE -->



    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>




<?php require('templates/footer.php'); ?>
        	


