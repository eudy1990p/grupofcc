<?php 
    require_once("plantilla/header.php");
    $detalleArticulo = getArticulo($conn,$_GET["idArticulo"]);
?>


<!-- MAIN -->
<div class="col-12 col-md-9">
     
     <h2><?php echo $detalleArticulo["titulo"] ; ?></h2>
     <div class="row">
            <div class="col-md-8">
                  <strong>Autor:</strong> <span><?php echo $detalleArticulo["usuario"] ; ?></span>
            </div>
            <div class="col-md-4">
               <strong>Fecha:</strong> <span><?php echo $detalleArticulo["fecha"] ; ?></span>
            </div>
     </div>
     <div id="imagen-articulo"></div>
     <div>
         <?php echo $detalleArticulo["cuerpo"] ; ?>
     </div>

    <hr />
    <h5 class="text-center" >Dejanos tu comentario <span class="oi oi-chat"></span></h5>
    <form>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Comentario</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
 </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr/>

<div class="row">
    <div class="col-md-3">
        Usuario<br/>
        Fecha: 2017-20-29
    </div>
    <div class="col-md-9">
        Comentario
    </div>
</div>

</div><!--/span-->
<!-- FIN MAIN -->


<?php
    require_once("plantilla/aside.php");
    require_once("plantilla/footer.php");
?>