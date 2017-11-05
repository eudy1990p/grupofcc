<?php 
    require_once("plantilla/header.php");
    $detalleArticulo = getArticulo($conn,$_GET["idArticulo"]);
    if(isset($_POST["accion"])){
        if($_POST["accion"] == "agregar_comentario"){
            
            setComentario($conn,"1",$_POST["comentario"],$_GET["idArticulo"]);
        }
    }
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
<form action="" method="post">
  <input type="hidden" name="accion" value="agregar_comentario" /> 
  <div class="form-group">
    <label for="exampleInputEmail1">Comentario</label>
    <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
 </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr/>
<?php 
    $queryComentario = getComentarios($conn);
    while($registroComentario = mysqli_fetch_array($queryComentario)){
?>
<div class="row">
    <div class="col-md-4">
        Usuario <?php echo $registroComentario["usuario"]; ?> <br/>
        Fecha: <?php echo $registroComentario["fecha"]; ?>
    </div>
    <div class="col-md-8">
       <?php echo $registroComentario["comentario"]; ?>
    </div>
</div>
<hr/>
<?php } ?>
</div><!--/span-->
<!-- FIN MAIN -->


<?php
    require_once("plantilla/aside.php");
    require_once("plantilla/footer.php");
?>