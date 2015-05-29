<!DOCTYPE html>
<html>
  <head>
     <?php include 'includes/navbar.php' ?> 
       <?php include 'includes/connect_bdd.php';?>

    <title>Annotorious - Image Annotation for the Web</title>
    <link type="text/css" rel="stylesheet" media="all" href="annotorious/css/highlight.css" />
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script src="openseadragon.min.js"></script>
    <script type="text/javascript" src="annotorious/annotorious.min.js"></script>
    <style>
      #map-annotate-button {
        position:absolute;
        top:3px;
        right:3px;
        background-color:#000;
        color:#fff;
        padding:3px 8px;
        z-index:10000;
        font-size:11px;
        text-decoration:none;
      }
    </style>
    <script>
      function annotate() {
        var button = document.getElementById('map-annotate-button');
        button.style.color = '#777';

        anno.activateSelector(function() {
          // Reset button style
          button.style.color = '#fff';
        });
      }

      function init() {             
        var viewer = OpenSeadragon({
          id: "openseadragon",
          prefixUrl: "images/",
          showNavigator: false,
          tileSources:"PhotoDzi/TCGA-BH-A1ES-01Z-00-DX1.C54C809F-748F-4BB0-B018-A8A83A4134C0.svs.dzi"
        });
        
        anno.makeAnnotatable(viewer);
      }
    </script>
  </head>

  <body onload="init()";>
            
    <div class="content">
      <div class="content-inner">
        <div style="position:relative; width:640px; height:400px; margin-bottom:20px;">
          <div id="openseadragon" style="width:640px; height:400px; background-color:#fff;"></div>
          <a id="map-annotate-button" onclick="annotate(); return false;" href="#">ADD ANNOTATION</a>
        </div>

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
            
    <script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery('pre.code').highlight({source:0, zebra:1, indent:'space', list:'ol'});
      });
    </script>
  </body>
</html>
