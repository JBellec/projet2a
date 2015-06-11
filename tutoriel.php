<?php include 'includes/header.php'; ?>
<?php include 'includes/connect_bdd.php';?>
 <!--<link href="css/style.css" rel="stylesheet">-->
  <?php
   try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=projet2a;charset=utf8', 'root', 'root');
    }
   catch (Exception $e)
   {
      die('Erreur : ' . $e->getMessage('pas connecté'));
   }
?> 
<head>
  <?php include 'includes/lightbox.php' ?>
</head>
<body>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = false;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>

 <title>Tutoriel</title>
  
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
                      <li class="active" ><a href="tutoriel.php">Tutoriel</a></li>
                      <li><a href="apropos.php">A propos</a></li>              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div>
    </div><!--/.container -->
    
    <div class="container">
      <div class="jumbotron">
        <h3>Tutoriel d'utilisation de la plateforme web de pathologie </h3>
      </div>
    </div>


<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <h2>Prérequis</h2><br /><br />

        <div class="col-lg-2">
          <img class="img-rounded" src="Logo/apache.png" alt="Generic placeholder image" width="140" height="140">
          <h3>Serveur Apache 2</h3>        
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-2">
          <img class="img-rounded" src="Logo/ubuntu.png" alt="Generic placeholder image" width="140" height="140">
          <h3>Ubuntu</h3>        
        </div><!-- /.col-lg-4 -->

        

        <div class="col-lg-2">
          <img class="img-rounded" src="Logo/MySQL.png" alt="Generic placeholder image" width="140" height="140">
          <h2>MySQL 5.5</h2>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-2">
          <img class="img-rounded" src="Logo/phpMyAdmin.png" alt="Generic placeholder image" width="140" height="140">
          <h2>phpMyAdmin 4.4.8</h2>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-2">
          <img class="img-rounded" src="Logo/OpenSeadragon.png" alt="Generic placeholder image" width="140" height="140">
          <h2>OpenSeadragon 2.0.0</h2>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading" id="step1">Création des dossiers nécessaires</h2>
          <p class="lead"> Commencez par télécharger le projet github suivant : 
        <a href = "https://github.com/Tumai/projet2a" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger le projet</button></a><br />
        Puis copiez le projet dans le dossier www de votre serveur web.
        Le dossier Image contiendra les images aux formats SVS. Ces images sont disponibles sur le site The Cancer Genome Atlas ici : 
        <a href = "https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/diagnostic_images/slide_images/" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger les images</button></a>.<br />
        Créez un dossier ImageDzi qui permettra de stocker les images converties.</p>
        </div>
        <div class="col-md-5">
          <img class ="fancybox" class="featurette-image img-responsive center-block" src="Logo/screenStep1.png" alt="Generic placeholder image" width="425" height="303.5">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Création de la base de données</h2>
          <p class="lead">Pour créer la base données, exécutez le fichier scriptBDD.sh,situé dans le dossier de votre serveur web, à l'aide de la commande "./scriptBDD.sh".
      Saisissez les identifiants de votre base de données.<br/>
      La base de données est maintenant opérationnelle.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class ="fancybox" class="featurette-image img-responsive center-block" src="Logo/screenStep2.png" alt="Generic placeholder image" width="425" height="303.5">        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Téléchargement et installation des paquets nécessaires</h2>
          <p class="lead">Il vous faudra installer une librairie de traitement d'image qui se nomme Vips pour la conversion des images SVS.<br />
      Pour cela, ouvrez un terminal et tapez la commande "sudo apt-get install libvips-tools".<br />
      Une fois installé, il vous faudra OpenSeaDragon pour visualiser les images converties. Normalement le dossier openseadragon est déjà présent grâce à l'étape <a href ="#step1" >"Création des dossiers nécessaires"</a>. Sinon vous pouvez le télécharger ici : 
      <a href = "https://openseadragon.github.io/#download" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger OpenSeaDragon</button></a>
      et copiez le dossier au même endroit que les dossiers Image et ImageDzi.<br /> Attention ! Si vous télécharger OpenSeaDragon pensez à changer le nom du dossier openseadragon-bin-version.zip en openseadragon.</p>
        </div>
        <div class="col-md-5">
          <img class ="fancybox" class="featurette-image img-responsive center-block" src="Logo/screenStep3.png" alt="Generic placeholder image" width="425" height="303.5">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Execution du script d'automatisation</h2>
          <p class="lead">A l'aide d'un terminal rendez-vous dans le dossier Image puis exécuter le fichier "scriptAuto.sh" à l'aide de la commande ./scriptAuto.sh. On vous demande de saisir les identifiants de votre base de données.
      Si c'est la première fois que vous exécutez le script, le processus peut prendre du temps car il doit convertir toutes les images.<br />
      Vous pouvez maintenant observer les images dans votre navigateur internet. </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class ="fancybox" class="featurette-image img-responsive center-block" src="Logo/screenStep4.png" alt="Generic placeholder image" width="425" height="303.5"> <br/>
          <img class ="fancybox" class="featurette-image img-responsive center-block" src="Logo/screenStep4.1.png" alt="Generic placeholder image" width="328.5" height="35">
        </div>
      </div>

      <!-- /END THE FEATURETTES -->

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
