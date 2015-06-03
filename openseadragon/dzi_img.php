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

       <?php include 'includes/navbar.php' ?> 
       <?php include 'includes/connect_bdd.php';?>

       <div class="container">
       <div class="row" style="border:10px">
            <div id="container" class ="col-xs-5 col-sm-9 col-lg-9">
            <div id="openseadragon1" style="width: 800px; height: 600px;"></div>
                <script src="openseadragon/openseadragon.min.js"></script>
                
                <script type="text/javascript">
                    var viewer = OpenSeadragon({
                    id: "openseadragon1",
                    prefixUrl: "images/",
                    tileSources:"PhotoDzi/<?php echo $_GET['titre'];?>.dzi"
                    });
                </script>
            

            </div>
        

        <div class="col-xs-12 col-sm-3 col-lg 3" id="sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            
            <p>
                Title : <?php echo $image['barcode'];?><br/>
                Gender : <?php echo $image['genre'];?><br/>
                Status :
                <?php if (strcmp($image['vital_status'],'Dead')==0){ ?>
                <span class="label label-danger">Dead</span><br/>
                <?php }else{ ?>

                <span class="label label-success">Alive</span><br/>

                <?php } ?>
                
                Race : <?php echo $image['race'];?><br/>
                Country : <?php echo $image['pays'];?><br/>
                Tumor : <?php echo $image['tumeur'];?><br/>
                Days to birth : <?php echo $image['daysToBirth'];?><br/>
                Days to death : <?php echo $image['daysToDeath'];?><br/>
                Tumor status : <?php echo $image['tumor_status'];?><br/>
                Days to last followup : <?php echo $image['last_contact'];?><br/>
                Age at diagnosis : <?php echo $image['age_diagnosis'];?><br/>
                Er status by IHC : 
		<?php if (strcmp($image['er_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
			      <?php }else{ ?>
			 <span class="label label-success">Positive</span><br/>
			       <?php } ?>
                Pr status by IHC : 			       		
		<?php if (strcmp($image['pr_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
				<?php } elseif(strcmp($image['pr_status'],'Indeterminate')==0){?>
			<span class="label label-warning">Indeterminate</span><br/>
			       	<?php }else{ ?>
			<span class="label label-success">Positive</span><br/>
			       	<?php } ?>
                Her2 status by IHC : 
		<?php if (strcmp($image['her2_status'],'Negative')==0){ ?>
			<span class="label label-danger">Negative</span><br/>
				<?php } elseif(strcmp($image['her2_status'],'Equivocal')==0){?>
			<span class="label label-warning">Equivocal</span><br/>
			       	<?php }else{ ?>
			<span class="label label-success">Positive</span><br/>
			       	<?php } ?>
                Histological type : <?php echo $image['histological_type'];?><br/><br/>
            
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
</html>
