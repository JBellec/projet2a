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
    
  </div>
  </body>
</html>
