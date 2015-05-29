<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Titre</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
       <?php include 'includes/navbar.php' ?> 
       <?php include 'includes/connect_bdd.php';?>

       <div class="container">
       <div class="row">
            <div id="container" class ="col-xs-5">
            <div id="openseadragon1" style="width: 800px; height: 600px;"></div>
                <script src="openseadragon.min.js"></script>
                <script src="openseadragon.js"></script>
                <script type="text/javascript">
                    var viewer = OpenSeadragon({
                    id: "openseadragon1",
                    prefixUrl: "images/",
                    tileSources:"PhotoDzi/<?php echo $_GET['titre'];?>.dzi"
                    });
                </script>
            

            </div>
        </div>

        <div class="col-xs-3 col-sm-3" id="sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <?php
            $req = $bdd->query('SELECT * FROM miniatures WHERE titre=\'' . $_GET['titre'] . '\'');
            $image = $req->fetch();
            ?> 
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
                Er status by IHC : <?php echo $image['er_status'];?><br/>
                Pr status by IHC : <?php echo $image['pr_status'];?><br/>
                Her2 status by IHC : <?php echo $image['her2_status'];?><br/>
                Histological type : <?php echo $image['histological_type'];?><br/>
            </p>
            <?php
            $req->closeCursor();
            ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
       </div>
        


    
    </body>
</html>