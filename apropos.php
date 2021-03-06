<?php include 'includes/header.php'; ?>
<?php include 'includes/connect_bdd.php';?>
 <link href="css/carousel.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
<body>
 <title>A propos</title>
  <div class="container">
        <!-- Static navbar -->
        <div class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><i class="fa fa-home"></i> PWPN </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav"> 
                      <li><a href="accueil.php">Accueil</a></li>
                      <li><a href="tutoriel.php">Tutoriel</a></li>
                      <li class="active"><a href="apropos.php">A propos</a></li>                 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div>
    </div><!--/.container -->

    <div class="container">
      	<div class="jumbotron">
        		<h3>Plateforme Web de Pathologie Numérique</h3><br/>
	     </div>

<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Qui somme nous ?</h1>
              <p>Elèves ingénieurs à l'ENSISA Mulhouse, nous avont conçu cette plateforme web dans le cadre d'un projet de fin d'année en collaboration avec Mr G.Forestier.</p>
	<p> Contactez nous par mail aux adresses suivantes :</p>
	<li><a href="mailto:#">dalia.ben-mechedal@uha.fr</a></li>
	<li><a href="mailto:#">julien.bellec@uha.fr</a></li>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Notre Objectif ?</h1>
              <p>Visualiser des images histologiques acquises par des microscopes électroniques. </p>
	<p>La visualisation de ces images volumineuses (~1gb par image)  par une plateforme web permet de faciliter leur utilisation pour le diagnostique (éventuellement à distance) ou pour la formation.</p>
              <p><a class="btn btn-lg btn-primary" href="accueil.php" role="button">Accès au images</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Un peu de technique </h1>
              <p>Nous convertissons les images du format SVS (format propriétaire de la société Aperio)  en Deep Zoom Image à l'aide d'une librairie de traitement d'image qui se nomme Vips.</p>
	<p>La visualisation des images de fait en JavaScript/HTML5 grâce à Openseadragon. Le processus de conversion et d'affichage est automatisé grâce à un script bash sous Ubuntu.</p>
	<p>Nous utilisons actuellement des données du cancer du sein provenant du TCGA (The Cancer Genome Atlas).</p>
              <p><a class="btn btn-lg btn-primary" href="http://cancergenome.nih.gov/" role="button">Données TCGA</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

    </div><!--/.container-->
  </body>

  <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#"><button type="button" class="btn btn-default">Back to top</button></a></p>
      </footer>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</html>