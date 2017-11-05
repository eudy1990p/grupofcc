<!-- ASIDE-->
          
        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <h3>Categorias</h3>
          <div class="list-group">
            <?php
                $query = getCategorias($conn); 
                while($categorias = mysqli_fetch_array($query) ){
            ?>
            <a href="articulo_por_categoria.php?idCategoria=<?php echo $categorias["id"]; ?>" class="list-group-item"><?php echo $categorias["nombre"]; ?></a>
            <?php } ?>
          </div>
        </div><!--/span-->
        <!-- FIN ASIDE-->