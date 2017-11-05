<?php
    function setComentario($conn,$idUsuario,$comentario,$idArticulo){
       $sql = "
                                      insert into comentarios
                                      (id_usuario,comentario,id_articulo, fecha) 
                                        values
                                        ('".$idUsuario."','".$comentario."','".$idArticulo."',now() )
                                      ";
        $query = mysqli_query($conn,$sql );
        //die();
        return $query;    
    }
    function getComentarios($conn){
        $query = mysqli_query($conn, "SELECT comentarios.*,usuarios.usuario FROM `comentarios` inner join usuarios on comentarios.id_usuario = usuarios.id");
        return $query;    
    }
    
?>