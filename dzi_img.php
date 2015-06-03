<?php include 'includes/connect_bdd.php';?>

        <?php
            $req = $bdd->query('SELECT * FROM miniatures WHERE titre=\'' . $_GET['titre'] . '\'');
            $image = $req->fetch();
        ?> 
<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />

	 <title><?php echo $image['barcode'];?></title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

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
                      <li><a href="apropos.php">A propos</a></li>
                      <li><a href="tutoriel.php">Tutoriel</a></li>                 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div>
    </div><!--/.container --> 
       <?php include 'includes/connect_bdd.php';?>

       <div class="container">
       <div class="row" style="border:10px">
            <div id="container" class ="col-xs-5 col-sm-9 col-lg-9">
            <div id="openseadragon1" style="width: 800px; height: 600px;"></div>
                <script src="openseadragon/openseadragon.min.js"></script>
                
                <script type="text/javascript">
                    var viewer = OpenSeadragon({
                    id: "openseadragon1",
                    prefixUrl: "openseadragon/images/",
                    tileSources:"PhotoDzi/<?php echo $_GET['titre'];?>.dzi"
                    });
                </script>
            

            </div>
        

        <div class="col-xs-12 col-sm-3 col-lg 3" id="sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            
            <p>
                <b>Title : </b><?php echo $image['barcode'];?><br/>
                <b>Gender : </b><?php echo $image['genre'];?><br/>
                <b>Status : </b>
                <?php if (strcmp($image['vital_status'],'Dead')==0){ ?>
                <span class="label label-danger">Dead</span><br/>
                <?php }else{ ?>

                <span class="label label-success">Alive</span><br/>

                <?php } ?>
                
                <b>Race : </b><?php echo $image['race'];?><br/>
                <b>Country : </b><?php echo $image['pays'];?><br/>
                <b>Tumor : </b><?php echo $image['tumeur'];?><br/>
                <b>Days to birth : </b><?php echo $image['daysToBirth'];?><br/>
                <b>Days to death : </b><?php echo $image['daysToDeath'];?><br/>
                <b>Tumor status : </b><?php echo $image['tumor_status'];?><br/>
                <b>Days to last followup : </b><?php echo $image['last_contact'];?><br/>
                <b>Age at diagnosis : </b><?php echo $image['age_diagnosis'];?><br/>
                <b>Er status by IHC : </b>
		<?php if (strcmp($image['er_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
			      <?php }else{ ?>
			 <span class="label label-success">Positive</span><br/>
			       <?php } ?>
                <b>Pr status by IHC : </b>			       		
		<?php if (strcmp($image['pr_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
				<?php } elseif(strcmp($image['pr_status'],'Indeterminate')==0){?>
			<span class="label label-warning">Indeterminate</span><br/>
			       	<?php }else{ ?>
			<span class="label label-success">Positive</span><br/>
			       	<?php } ?>
                <b>Her2 status by IHC : </b>
		<?php if (strcmp($image['her2_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
				<?php } elseif(strcmp($image['her2_status'],'Equivocal')==0){?>
			<span class="label label-warning">Equivocal</span><br/>
			       	<?php }else{ ?>
			<span class="label label-success">Positive</span><br/>
			       	<?php } ?>
                <b>Histological type : </b><?php echo $image['histological_type'];?><br/><br/>
            
            <a href = <?php echo $image['xml'];?> target ="_blank"><button type="button" class="btn btn-sm btn-info">Lien vers les données du patient</button></a><br/><br/>
        </div><!--/.sidebar-offcanvas-->
    </div>
    </div>
            <a href = <?php echo $image['pdf'];?> target ="_blank"><button type="button" class="btn btn-sm btn-info">Lien vers le rapport de pathologie</button></a>
            </p>

            <iframe src=<?php echo $image['pdf'];?> width="800" height="600" align="middle"></iframe><br/><br/>
            <?php
            $req->closeCursor();
            ?>
          
        
       </div>
    </body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</html>
