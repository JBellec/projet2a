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
 <title>Accueil</title>
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
                      <li class="active"><a href="accueil.php">Accueil</a></li>
                      <li><a href="tutoriel.php">Tutoriel</a></li>
                      <li><a href="apropos.php">A propos</a></li>                                       
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div>
    </div><!--/.container -->
    
<?php
      $i=0;  
      $her2_status = isset($_GET['her2_status']) && !empty($_GET['her2_status']) ? $_GET['her2_status']: '';
      $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status']: '';
      $er_status = isset($_GET['er_status']) && !empty($_GET['er_status']) ? $_GET['er_status']: '';
      $pr_status = isset($_GET['pr_status']) && !empty($_GET['pr_status']) ? $_GET['pr_status']: '';
      $barcode = isset($_GET['barcode']) && !empty($_GET['barcode']) ? $_GET['barcode']: '';
      if( isset($_GET['her2_status']) && !empty($_GET['her2_status']) && isset($_GET['status']) && !empty($_GET['status']))
      {
        $req = $bdd->query("SELECT * from miniatures where her2_status='".$her2_status."' AND vital_status='".$status."'");
      }
      elseif( isset($_GET['her2_status']) && !empty($_GET['her2_status']) && isset($_GET['pr_status']) && !empty($_GET['pr_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where her2_status='".$her2_status."' AND pr_status='".$pr_status."'");
      }
      elseif( isset($_GET['her2_status']) && !empty($_GET['her2_status']) && isset($_GET['er_status']) && !empty($_GET['er_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where her2_status='".$her2_status."' AND er_status='".$er_status."'");
      }
      elseif( isset($_GET['er_status']) && !empty($_GET['er_status']) && isset($_GET['pr_status']) && !empty($_GET['pr_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where er_status='".$er_status."' AND pr_status='".$pr_status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['pr_status']) && !empty($_GET['pr_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."' AND pr_status='".$pr_status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['pr_status']) && !empty($_GET['pr_status'])  && isset($_GET['er_status']) && !empty($_GET['er_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."' AND pr_status='".$pr_status."' AND er_status='".$er_status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['er_status']) && !empty($_GET['er_status'])  && isset($_GET['her2_status']) && !empty($_GET['her2_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."' AND er_status='".$er_status."' AND her2_status='".$her2_status."'");
      }
      elseif( isset($_GET['pr_status']) && !empty($_GET['pr_status']) && isset($_GET['er_status']) && !empty($_GET['er_status'])  && isset($_GET['her2_status']) && !empty($_GET['her2_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where pr_status='".$pr_status."' AND er_status='".$er_status."' AND her2_status='".$her2_status."'");
      }
      elseif( isset($_GET['pr_status']) && !empty($_GET['pr_status']) && isset($_GET['er_status']) && !empty($_GET['er_status'])  && isset($_GET['her2_status']) && !empty($_GET['her2_status']) && isset($_GET['status']) && !empty($_GET['status']))
      {
        $req = $bdd->query("SELECT * from miniatures where pr_status='".$pr_status."' AND er_status='".$er_status."' AND her2_status='".$her2_status."' AND vital_status='".$status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['pr_status']) && !empty($_GET['pr_status'])  && isset($_GET['er_status']) && !empty($_GET['er_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."' AND pr_status='".$pr_status."' AND er_status='".$er_status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['er_status']) && !empty($_GET['er_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."' AND er_status='".$er_status."'");
      }
      elseif( isset($_GET['her2_status']) && !empty($_GET['her2_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where her2_status='".$her2_status."'");
      }
      elseif( isset($_GET['status']) && !empty($_GET['status']))
      {
        $req = $bdd->query("SELECT * from miniatures where vital_status='".$status."'");
      }
      elseif( isset($_GET['er_status']) && !empty($_GET['er_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where er_status='".$er_status."'");
      }
      elseif( isset($_GET['pr_status']) && !empty($_GET['pr_status']))
      {
        $req = $bdd->query("SELECT * from miniatures where pr_status='".$pr_status."'");
      }
      elseif( isset($_GET['barcode']) && !empty($_GET['barcode']))
      {
        $req = $bdd->query("SELECT * from miniatures where barcode='".$barcode."'");
      }
      else
      {
        $req = $bdd->query('SELECT * FROM miniatures');
      }
     ?>
         
    <div class="container">
      	<div class="jumbotron">

        		<h3>Plateforme Web de Pathologie Numérique</h3><br/>
<div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Recherche avancée</h3>
      </div>
      <div class="panel-body">
 
    
	          <form class="form-inline" method ="get" action ="accueil.php">
	            <label>Barcode : </label>
	            		<input name ="barcode" type ="text" placeholder ="TCGA-**-****" size="13"/>&emsp;
	            <label>Status vital : </label>
	           		 <select name="status">
		  		 <option value=""><?php if( isset($_GET['status']) && !empty($_GET['status'])) {echo $_GET['status']; }?></option>
		  		 <option value="Dead">Dead</option>
		  		<option value="Alive">Alive</option>
	            		</select>&emsp;
	            <label>Er status by IHC : </label>
	           		 <select name="er_status">
		  		 <option value=""><?php if( isset($_GET['er_status']) && !empty($_GET['er_status'])) {echo $_GET['er_status']; }?></option>
		  		 <option value="Positive">Positive</option>
		  		<option value="Negative">Negative</option>
	            		</select>&emsp;</br>
	            <label>Pr status by IHC : </label>
	           		 <select name="pr_status">
		  		 <option value=""><?php if( isset($_GET['pr_status']) && !empty($_GET['pr_status'])) {echo $_GET['pr_status']; }?></option>
		  		 <option value="Positive">Positive</option>
		  		<option value="Negative">Negative</option>
				<option value="Indeterminate">Indeterminate</option>
	            		</select>&emsp;
	            <label>Her2 status by IHC : </label>
	            		<select name="her2_status">
		  		 <option value=""><?php if( isset($_GET['her2_status']) && !empty($_GET['her2_status'])) {echo $_GET['her2_status']; }?></option>
		   		<option value="Negative">Negative</option>
				<option value="Positive">Positive</option>
		  		 <option value="Equivocal">Equivocal</option>
	           		 </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Search</button>
	          </form>
      	</div></div>  </div>
          <div class="row">
         			   <?php
         			  while($image = $req->fetch()){ 
          			  ?> 
		            <div class="col-sm-2 col-md-2 col-lg-2">
			 	<h2 class="titre"><?php echo $image['barcode'];?></h2>
			 	<a href="dzi_img.php?titre=<?php echo $image['titre'];?>" ><img class="img-rounded" src='<?php echo $image['chemin'];?>' /></a>
			 	<div class="dropdown"><br />
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">View Details
        <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="menu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Gender :  </b><?php echo $image['genre'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Status :  </b>
                <?php if (strcmp($image['vital_status'],'Dead')==0){ ?>
                <span class="label label-danger">Dead</span><br/>
                <?php }else{ ?>
            <span class="label label-success">Alive</span><br/>
                <?php } ?>
                </a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Race : </b><?php echo $image['race'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Country :  </b><?php echo $image['pays'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Tumor :  </b><?php echo $image['tumeur'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Days to birth :  </b><?php echo $image['daysToBirth'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Days to death :  </b><?php echo $image['daysToDeath'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Tumor status :  </b><?php echo $image['tumor_status'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Days to last followup :  </b><?php echo $image['last_contact'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Age at diagnosis :  </b><?php echo $image['age_diagnosis'];?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Er Status by IHC:  </b>
                <?php if (strcmp($image['er_status'],'Negative')==0){ ?>
                <span class="label label-danger">Negative</span><br/>
                <?php }else{ ?>
            <span class="label label-success">Positive</span><br/>
                <?php } ?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Pr Status by IHC:  </b>
                <?php if (strcmp($image['pr_status'],'Negative')==0){ ?>
                <span class="label label-danger">Negative</span><br/>
          <?php } elseif(strcmp($image['pr_status'],'Indeterminate')==0){?>
            <span class="label label-warning">Indeterminate</span><br/>
                <?php }else{ ?>
            <span class="label label-success">Positive</span><br/>
                <?php } ?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Her2 Status by IHC:  </b>
                <?php if (strcmp($image['her2_status'],'Negative')==0){ ?>
                <span class="label label-danger">Negative</span><br/>
          <?php } elseif(strcmp($image['her2_status'],'Equivocal')==0){?>
            <span class="label label-warning">Equivocal</span><br/>
                <?php }else{ ?>
            <span class="label label-success">Positive</span><br/>
                <?php } ?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" ><b>Histological type :  </b><?php echo $image['histological_type'];?></a></li>
        </ul>
  </div>
		            </div>
        			 <?php
             		  $i = ($i+1)%6;
               		 if($i==6) {
            			  ?>
                  </div>
 
          <?php
                 } }
             
         $req->closeCursor();
       ?> 

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
