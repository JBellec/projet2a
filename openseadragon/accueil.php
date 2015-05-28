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
      $i=0;  
      $gender = isset($_GET['gender']) && !empty($_GET['gender']) ? $_GET['gender']: '';
      $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status']: '';
      if( isset($_GET['gender']) && !empty($_GET['gender']) && isset($_GET['status']) && !empty($_GET['status']))
      {
        $req = $bdd->query("SELECT * from miniatures where genre='".$gender."' AND vital_status='".$status."'");
      }
      elseif( isset($_GET['gender']) && !empty($_GET['gender']))
      {
        $req = $bdd->query("SELECT * from miniatures where genre='".$gender."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."'");
      }
      else
      {
        $req = $bdd->query('SELECT * FROM miniatures');
      }
     ?>
         
    <div class="container">
      <div class="jumbotron">
        <h3>Plateforme Web de Pathologie Numérique</h3><br/>
        <h4>****Recherche avancée**** </h4>
          <form class="form-inline" method ="get" action ="accueil.php?genre=<?php echo $_GET['gender']&amp;?>status=<?php echo $_GET['status'];?>">
            Status vital : 
            <select name="status">
                <option value=""></option>
                <option value="Dead">Dead</option>
                <option value="Alive">Alive</option>
            </select>
            Genre : 
            <select name="gender">
                <option value=""></option>
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
              <li class="dropdown">
                <a class="btn btn-default" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">View details <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>Gender : <?php echo $image['genre'];?></li>
                  <li>Status : 
                    <?php if (strcmp($image['vital_status'],'Dead')==0){ ?>
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
    </div><!--/.container-->
  </body>
</html>
