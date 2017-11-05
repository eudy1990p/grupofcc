<?php 
    require_once("plantilla/header.php");
?>


<!-- MAIN -->
        <div class="col-12 col-md-9">
          <h3>Resultado de la busqueda</h3>
          <hr/>
          <div class="row">

           <?php
                $query = buscarArticulos($conn,$_POST["palabraABuscar"]); 
                if(mysqli_num_rows($query) > 0){
                while($articulos = mysqli_fetch_array($query) ){
            ?>
            <div class="col-6 col-lg-4">
              <h2><?php echo $articulos["titulo"]; ?></h2>
              <p><?php echo $articulos["extracto"]; ?> </p>
              <p><a class="btn btn-secondary" href="vista_detalle.php?idArticulo=<?php echo $articulos["id"]; ?>" role="button">View details &raquo;</a></p>
            </div><!--/span-->

            <?php 
                }
                }else{
            ?>
            <h4>No se pudo encontrar resultado</h4>
            <?php } ?>
          </div><!--/row-->
        </div><!--/span-->
          <!-- FIN MAIN -->


<?php
    require_once("plantilla/aside.php");
    require_once("plantilla/footer.php");
?>