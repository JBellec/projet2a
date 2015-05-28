<?php include 'includes/header.php'; ?>
<?php include 'includes/connect_bdd.php';?>
  
<body>
  <?php include 'includes/navbar.php' ?>

                <?php
      $i=0;
       if( isset($_GET['gender']) && !empty($_GET['gender'])){
      echo "not empty";
      $req = $bdd->query('SELECT * from miniatures where genre=\'' . $_GET['gender'] . '\'');    }
      else{
                     $req = $bdd->query('SELECT * FROM miniatures');
                  }
     ?>
                  
    <div class="container">
          <div class="jumbotron">
            <h3>Plateforme Web de Pathologie Numérique</h3><br/>
      <h4>****Recherche avancée**** </h4>
    <form class="form-inline" method ="get" action ="testAccueil.php?genre=<?php echo $_GET['gender']&amp;?>status=<?php echo $_GET['status'];?>">
      <select name="status">
          <option value="Dead">Dead</option>
          <option value="Alive">Alive</option>
      </select>
      <select name="gender">
          <option value="MALE">male</option>
          <option value="FEMALE">female</option>
      </select>&emsp;&emsp;&emsp;&emsp;&emsp;
      <button type="submit" class="btn btn-default">Search</button>
    </form>

          </div>
          
          <div class="row">
            <?php
             while($image = $req->fetch()){ 
               ?> 
            <div class="col-xs-2 col-md-2">
              <h2 class="titre"><?php echo $image['barcode'];?></h2>
              <a href="dzi_img.php?titre=<?php echo $image['titre'];?>" ><img src='<?php echo $image['chemin'];?>' /></a>
              <!--<a class="btn btn-default" class="dropdown" href="<?php echo $image['xml'];?>" role="button">View details &raquo;</a>-->
              <li class="dropdown">
                <a class="btn btn-default" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">View details <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>Status : <?php echo $image['vital_status'];?></li>
                  <li>Tumor : <?php echo $image['tumeur'];?></li>
                  <li></li>
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
