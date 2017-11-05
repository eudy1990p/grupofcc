<?php session_start(); 
    //echo "Usuario ".$_SESSION["USUARIO"];
?>
<ul>    
    <?php if(isset($_SESSION["ID"])){ ?>
        <li>
            <a href="administrar_mp3.php">
                administrar mp3
            </a>
        </li>
        <li>
            <a href="administrar_usuario.php">
                administrar usuario
            </a>
        </li>
        <li>
            <a href="salir.php">
                Salir
            </a>
        </li>
    
        <?php }else{ ?>
    <!----------------------------------->
    
        <li>
            <a href="reproductor_mp3.php">
             Reproductor mp3    
            </a>
        </li>
    <li>
            <a href="contacto.php">
             Contacto    
            </a>
        </li>

        <li>
            <a href="login.php">
                Entrar
            </a>
        </li>
    <?php } ?>
</ul>