<?php
    function getCategorias($conn){
        $query = mysqli_query($conn, "select * from categorias");
        return $query;    
    }
?>