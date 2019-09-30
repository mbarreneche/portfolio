<?php  

function armarMarcador($datos)
{
  return [
    "nombre" => trim($datos["nombre"]),
    "direccion" => trim($datos["direccion"]),
    "ciudad" => trim($datos["ciudad"]),
    "codigo_postal" => trim($datos["codigo_postal"]),
    "pais" => trim($datos["pais"])
  ];
}

function guardarMarcador($marcador)
{
  $json = file_get_contents("lugares.json");
  $array = json_decode($json, true);
  $array["lugares"][] = $marcador;
  $array = json_encode($array, JSON_PRETTY_PRINT);
  file_put_contents("lugares.json", $array);
}
