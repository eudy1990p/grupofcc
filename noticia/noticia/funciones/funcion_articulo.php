<?php
    function getArticulos($conn){
        $query = mysqli_query($conn, "select * from articulos");
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