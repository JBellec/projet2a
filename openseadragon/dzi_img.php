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

       <div class="row">
            <div id="container" class ="col-xs-8">
            <div id="openseadragon1" style="width: 800px; height: 600px;"></div>
                <script src="openseadragon.min.js"></script>
                <script type="text/javascript">
                    var viewer = OpenSeadragon({
                    id: "openseadragon1",
                    prefixUrl: "images/",
                    tileSources:"PhotoDzi/<?php echo $_GET['titre'];?>.dzi"
                    });
                </script>
            </div>

        <div class="col-xs-4 col-sm-3" id="sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <?php
            $req = $bdd->query('SELECT * FROM miniatures WHERE titre=\'' . $_GET['titre'] . '\'');
            $image = $req->fetch();

            ?> 
            <p>
                Title : <?php echo $image['barcode'];?><br/>
                Gender : <?php echo $image['genre'];?><br/>
                Status : <?php echo $image['status'];?><br/>
                Race : <?php echo $image['race'];?><br/>
                Country : <?php echo $image['pays'];?><br/>
                Tumor : <?php echo $image['tumeur'];?><br/>
            </p>
          </div>
        </div><!--/.sidebar-offcanvas-->
       </div>
        


    
    </body>
</html>