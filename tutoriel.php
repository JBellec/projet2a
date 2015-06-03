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
        Commencez par télécharger le projet github suivant : 
        <a href = "https://github.com/Tumai/projet2a" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger le projet</button></a><br />
        Puis copier le projet dans le dossier www de votre serveur web.
        Le dossier Photo contiendra les photos aux formats SVS. Ces photos sont disponibles sur le site The Cancer Genome Atlas ici : 
        <a href = "https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/diagnostic_images/slide_images/" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger les photos</button></a>.<br />
        Créez un dossier PhotoDzi qui permettra de stocker les images converties.
    </p><br />

    <h3>Création de la base de données</h3>
    <p>
      Pour créer la base données, exécutez le fichier scriptBDD.sh,situé dans le dossier de votre serveur web, à l'aide de la commande ./scriptBDD.sh.
      <br />
      Saisissez les identifiants de votre base de données.<br/>
      La base de données est maintenant opérationnelle.
    </p><br />

    <h3>Téléchargement et installation des paquets nécessaires</h3>
    <p>
      Il vous faudra installer une librairie de traitement d'image qui se nomme Vips pour la conversion des images SVS.<br />
      Pour cela, ouvrez un terminal et tapez la commande "sudo apt-get libvips-tools".<br />
      Une fois installé, il vous faudra OpenSeaDragon pour visualiser les images converties. Normalement le dossier openseadragon est déjà présent grâce à la première étape. Sinon vous pouvez le télécharger ici : 
      <a href = "https://openseadragon.github.io/#download" target ="_blank"><button type="button" class="btn btn-sm btn-info">Télécharger OpenSeaDragon</button></a>
      et copiez le dossier au même endroit que les dossiers Photo et PhotoDzi.<br /> Attention ! Si vous télécharger OpenSeaDragon pensez à changer le nom du dossier openseadragon-bin-version.zip en openseadragon.
    </p><br/>

    <h3>Execution du script d'automatisation</h3>
    <p>
      Avant d'exécuter le fichier scriptAuto.sh, déplacez le dans le dossier Photo. A l'aide d'un terminal rendez-vous dans ce dossier puis exécuter le script à l'aide de la commande ./scriptAuto.sh. On vous demande de saisir les identifiants de votre base de données.
      Si c'est la première fois que vous exécuter le script, le processus peut prendre du temps car il doit convertir toutes les photos.<br />
      Vous pouvez maintenant observer les photos dans votre navigateur internet.
    </p>
    
  </div>
  </body>
</html>
