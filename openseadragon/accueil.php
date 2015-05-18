<?php include 'includes/header.php'; ?>

<body>
  <?php include 'includes/navbar.php' ?>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h3>Plateforme Web de Pathologie Numérique</h3>
          </div>
          
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <?php
                   $req = $bdd->query('SELECT chemin, titre, imgOriginale FROM miniatures');
                   while($image = $req->fetch()){ 
               ?> 
              <h2><?php echo $image['titre'];?></h2>
              <p><a href='<?php echo $image['imgOriginale']; ?>'><img src='<?php echo $image['chemin'];?>' /></a></p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
              <?php
                 }
              ?>
            </div>
          </div>

       <!-- <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Acceuil</a>
            <a href="#" class="list-group-item">Nous contacter</a>
            <a href="#" class="list-group-item">Lien originaux</a>
          </div> -->
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <footer>
        <p>&copy; ENSISA 2015</p>
        
      </footer>
       <?php 
         $req->closeCursor();
       ?>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
  </body>
</html>
