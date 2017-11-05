<?php 
    require_once("plantilla/header.php");
?>


<!-- MAIN -->
        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row">

           <?php
                $query = getArticulos($conn); 
                while($articulos = mysqli_fetch_array($query) ){
            ?>
            <div class="col-6 col-lg-4">
              <h2><?php echo $articulos["titulo"]; ?></h2>
              <p><?php echo $articulos["extracto"]; ?> </p>
              <p><a class="btn btn-secondary" href="vista_detalle.php?idArticulo=<?php echo $articulos["id"]; ?>" role="button">View details &raquo;</a></p>
            </div><!--/span-->

            <?php 
                }
            ?>

          </div><!--/row-->
        </div><!--/span-->
          <!-- FIN MAIN -->


<?php
    require_once("plantilla/aside.php");
    require_once("plantilla/footer.php");
?>