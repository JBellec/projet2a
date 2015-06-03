<?php include 'includes/header.php'; ?>
<?php include 'includes/connect_bdd.php';?>
 <link href="css/style.css" rel="stylesheet">
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
<body>
 <title>Tutoriel</title>
  <?php include 'includes/navbar.php' ;?>
  <div class="container">
    <div class="jumbotron">
      <h2>Tutoriel d'utilisation de la plateforme web de pathologie </h2>
    </div>

    <h3>Prérequis</h3>
    <p>
      Serveur Apache <br />
      MySQL <br />
      phpMyAdmin <br />
    </p>
    <h3>Création des dossiers nécessaires</h3>
    <p>
        Commencez par extraire les fichier et dossier contenu dans le zip dans le dossier www de votre serveur web.
        Créez un dossier Photo qui contiendra les photos aux format SVS. Ces photos sont disponibles sur le site The Cancer Genome Atlas ici : <a href = "https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/diagnostic_images/slide_images/" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger les photos</button></a>.<br />
        Ensuite créez un dossier PhotoDzi qui permettra de stocker les images converties.
    </p>
    <h3>Création de la base de données</h3>
    <p>
      Pour créez la base données, exécutez le fichier scriptBDD.sh,situer dans le zip, à l'aide de la commande ./scriptBDD.sh.
      La base de données est maintenant opérationnelle.
    </p>
    <h3>Téléchargement et installation des paquets nécessaire</h3>
    <p>
      Il vous faudra installer une librairie de traitement d'image qui se nomme Vips pour la conversion des images SVS.<br />
      Pour cela, ouvrez un terminal et tapez la commande "sudo apt-get libvips-tools".
      Une fois installé, il vous faudra OpenSeaDragon pour visualiser les images converties. Normalement le dossier openseadragon est déjà présent grâce à la première étape. Sinon copiez le dossier situé dans le zip au même endroit que les dossiers Photo et PhotoDzi.

    <h3>Execution du script d'automatisation</h3>
    <p>
      Avant d'exécuter le fichier scriptAuto.sh, déplacez le dans le dossier Photo. A l'aide d'un terminal rendez-vous dans ce dossier puis exécuter le script à l'aide de la commande ./scriptAuto.sh. On vous demande de saisir les identifiants de votre base de données. Si c'est la première fois que vous exécuter le script, le processus peut prendre du temps car il doit convertir toutes les photos.
      Vous pouvez maintenant observer les photos dans votre navigateur internet.
    </p>
    
  </div>
  </body>
</html>
