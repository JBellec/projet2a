<?php include 'includes/header.php'; ?>
<?php
   try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=projet2a;charset=utf8', 'root', '');
      echo('connecté');
    }
   catch (Exception $e)
   {
      die('Erreur : ' . $e->getMessage('pas connecté'));
   }
?>


<body>

            <div class="col-xs-6 col-lg-4">
              <?php
                   $req = $bdd->query('SELECT chemin FROM miniatures where titre =\'violet\'');
                   while($image = $req->fetch()){ 
               ?> 
              <h2>Heading</h2>
             <p><a href="test.html"><img src='<?php echo $image['chemin'];?>' /></a></p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                     <?php
                        }
                     ?>
            </div><!--/.col-xs-6.col-lg-4-->


            <div class="col-xs-6 col-lg-4">
              <?php
                $req = $bdd->prepare('SELECT chemin FROM miniatures where titre = ?');
               $req -> execute (array($_GET['titre'])); ?>
 
              <h2>Heading</h2>
              <p><a href="test.html"><img src='<?php echo $_GET['titre'];?>' /></a></p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    
              <p> </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p></p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
        
      </footer>
       <?php
         
         $req->closeCursor();
       ?>


    </div><!--/.container-->
  </body>
</html>
