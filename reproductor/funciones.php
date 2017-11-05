<?php
    function validarSession(){
        if(isset($_SESSION["ID"])){
            echo "Hola querido compadre.";
        }else{
           header("location:login.php");
            }
    }
?>