<?php include 'includes/header.php'; ?>
<?php include 'includes/connect_bdd.php';?>
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
  <?php include 'includes/navbar.php' ?>

                <?php
                   $req = $bdd->query('SELECT * FROM miniatures');
                   $i=0; 
                ?>
                  
    <div class="container">
          <div class="jumbotron">
            <h3>Plateforme Web de Pathologie Numérique</h3>
          </div>
          
          <div class="row">
            <?php
             while($image = $req->fetch()){ 
              echo(strcmp($image['genre'],'FEMALE'));
               ?> 
            <div class="col-xs-2 col-md-2">
              <h2 class="titre"><?php echo $image['barcode'];?></h2>
              <a href="dzi_img.php?titre=<?php echo $image['titre'];?>" ><img src='<?php echo $image['chemin'];?>' /></a>
              <!--<a class="btn btn-default" class="dropdown" href="<?php echo $image['xml'];?>" role="button">View details &raquo;</a>-->
              <li class="dropdown">
                <a class="btn btn-default" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">View details <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>Gender : <?php echo $image['genre'];?></li>
                  <li>Status : 
                    <?php if (strcmp($image['vital_status'],'Dead')==1){ ?>
                              <span class="label label-danger">Dead</span><br/>
                    <?php }else{ ?>
                            <span class="label label-success">Alive</span><br/>
                    <?php } ?></li>
                     <li>Race : <?php echo $image['race'];?></li>
                     <li>Country : <?php echo $image['pays'];?></li>
                    <li>Tumor : <?php echo $image['tumeur'];?></li>
                    <li>Days to birth : <?php echo $image['daysToBirth'];?></li>
                    <li>Days to death : <?php echo $image['daysToDeath'];?></li>
                    <li>Tumor status : <?php echo $image['tumor_status'];?></li>
                    <li>Days to last followup : <?php echo $image['last_contact'];?></li>
                    <li>Age at diagnosis : <?php echo $image['age_diagnosis'];?></li>
                    <li>Er status by IHC : <?php echo $image['er_status'];?></li>
                    <li>Er status by IHC : <?php echo $image['er_status'];?></li>
                    <li>Pr status by IHC : <?php echo $image['pr_status'];?></li>
                    <li>Her2 status by IHC : <?php echo $image['her2_status'];?></li>
                    <li>Histological type : <?php echo $image['histological_type'];?></li>
                </ul>
              </li>
            </div>
              <?php
                $i = ($i+1)%6;
                if($i==6) {
              ?>
                  </div>
                  </div>
          <?php
                 } }
             
         $req->closeCursor();
       ?>

      <footer>
        <p>&copy; ENSISA 2015</p>
        
      </footer>
       

    </div><!--/.container-->


    
  </body>
</html>
