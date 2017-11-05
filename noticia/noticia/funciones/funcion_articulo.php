<?php
    function getArticulos($conn){
        $query = mysqli_query($conn, "select * from articulos");
        return $query;    
    }
    function getArticulosPorCategoria($conn,$idCategoria){
        $query = mysqli_query($conn, "select * from articulos where id_categoria = '".$idCategoria."' ");
        return $query;    
    }

      function buscarArticulos($conn,$palabraABuscar){
        $query = mysqli_query($conn, "select * from articulos where concat(titulo,' ',cuerpo,' ',extracto) like '%".$palabraABuscar."%' ");
        return $query;    
    }
     function getArticulo($conn,$idArticulo){
        $query = mysqli_query($conn, "SELECT articulos.*,usuarios.usuario 
                                        FROM `articulos` 
                                        inner join usuarios on articulos.id_usuario = usuarios.id 
                                        where articulos.id = '".$idArticulo."' 
                                        ");
        if($query){
            $registro = mysqli_fetch_array($query);
            return  $registro;
        }
         
    }
    
?>