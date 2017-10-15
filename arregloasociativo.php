<?php
/*
    //$producto["arroz"] = 3000;
    $producto["arroz"]["1lb"] = 10;
    print_r($producto);
   // echo $producto["arroz"];
    echo $producto["arroz"]["1lb"];*/

$producto = array(
    "arroz"=>array(
        "1lb"=>10,
        "2lb"=>20,
        "3lb"=>30
    ),
    "azucar"=>array(
        "1lb"=>10,
        "2lb"=>20
    )
);
/*echo $producto["arroz"]["2lb"]+$producto["arroz"]["3lb"]+$producto["arroz"]["3lb"];*/
print_r($producto);
?>