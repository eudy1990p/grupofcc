<?php
session_start();
    $con = mysqli_connect("localhost","root","","db_reproductor");
    if(isset($_REQUEST["que_debo_hacer"])){
    switch($_REQUEST["que_debo_hacer"]){
        case "entrar_al_sistema":
                    
                     $sqlUsuario = "select 
                    * from usuario where usuario = '".$_REQUEST["usuario"]."' and clave = '".md5($_REQUEST["clave"])."' ";
                    $QueryUsuario = mysqli_query($con,$sqlUsuario);
                    $DatoUsuario = mysqli_fetch_array($QueryUsuario);
                    $_SESSION["ID"] = $DatoUsuario["id"];
                    $_SESSION["USUARIO"] = $DatoUsuario["usuario"];
                    header("location:menu.php");
                    //print_r($DatoUsuario);
                break;
    }
    }
?>
<!doctype html>
<html>
    <head>
    
    </head>
    <body>
        <form action="" method="post">
            <input type="hidden" value="entrar_al_sistema" name="que_debo_hacer" />
            <input name="usuario" type="text" placeholder="Usuario"/><hr/>
            <input name="clave" type="password" placeholder="Clave"/><hr/>
            
            <button type="submit">
                Entrar
            </button>
        </form>
        
    </body>
</html>