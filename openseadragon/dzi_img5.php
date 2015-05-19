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

        <div id="container">
          <div id="openseadragon1" style="width: 800px; height: 600px;"></div>
        <script src="openseadragon.min.js"></script>
        <script type="text/javascript">
            var viewer = OpenSeadragon({
                id: "openseadragon1",
                prefixUrl: "images/",
                tileSources:"PhotoDzi/img5.dzi"
                });
        </script>
    </div>
    </body>
</html>