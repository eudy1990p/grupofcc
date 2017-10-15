

<?php
  /*  $para = "";
    $asunto = "";
    $mensaje = "";
mail($para,$asunto,$mensaje);
*/
$text = "texto 1 hola mundo";
//echo substr($text,0,6);
echo strrev($text);




//print_r($_POST);
//echo $_GET["nombre"];
  //echo $_POST["nombre"];  
?>
<form action="" method="get"
      >
    <input type="text" name="nombre" placeholder="Nombre persona" />
    <br/><br/>
    <input type="submit" value="enviar">
</form>