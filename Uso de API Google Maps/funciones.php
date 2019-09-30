<?php

session_start();

function validarRegistro($datos) {

  //Juntar errores del form//

  $errores = [];
  $datosTrim = [];
  //Eliminar espacion en blanco del form con trim//
  foreach ($datos as $posicion => $valor) {
    $datosTrim[$posicion] = trim($valor);
  }

  if (strlen($datosTrim["name"]) == 0) {
    $errores["name"] = "El nombre no puede estar vacio";
    //Que no tenga caracteres alfanumericos//
  } else if (ctype_alpha($datosTrim["name"]) == false) {
    $errores["name"] = "El nombre debe contener solo letras";
  }
  //Para apellido mismas validaciones//
  if (strlen($datosTrim["lastName"]) == 0) {
    $errores["lastName"] = "El apellido no puede estar vacio";
    //Que no tenga caracteres alfanumericos//
  } else if (ctype_alpha($datosTrim["lastName"]) == false) {
    $errores["lastName"] = "El apellido debe contener solo letras";
  }

  //Validar Email//

  if (strlen($datosTrim["email"]) == 0) {
    $errores["email"] = "El email no puede estar vacio";
  } else if (filter_var($datosTrim["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El formato del email no es valido";
  } else if (existeUsuario($datosTrim["email"])) {
    $errores["email"] = "El email ya esta registrado";
  }

  // Validar contraseña //
  if (strlen($datos["pwd"]) == 0) {  //Validar sin trim por si hay espacios adredes.//
    $errores["pwd"] = "La contraseña no puede estar vacia";
  } else if ($datos["pwd"] !== $datos["retypepwd"]) { //Validar que las contraseñas sean iguales//
    $errores["pwd"] = "Las contraseñas no coinciden";
  }

  //Validar Terminos y condiciones//
  if (!isset($datos["accepted"])) {
    $errores["accepted"] = "Por favor acepte terminos y condiciones.";
  }

  return $errores;

}

function lastId()
{ //Se usa para sacar el ultimo id de la lista de usuarios de json//
  $json = file_get_contents("base.json");
  $array = json_decode($json, true);
  if (empty($json)) {
    return 1;
  }
  $ultimoId = array_pop($array["usuarios"]);
  $lastId = $ultimoId["id"] + 1;
  return $lastId;
}

function armarUsuario($datos)
{
  return [
    "id" => lastId(),
    "name" => trim($datos["name"]),
    "lastname" => trim($datos["lastName"]),
    "email" => trim($datos["email"]),
    "password" => password_hash($datos["pwd"], PASSWORD_DEFAULT),
  ];
}

function guardarUsuario($user)
{
  $json = file_get_contents("base.json");
  $array = json_decode($json, true);
  $array["usuarios"][] = $user;
  $array = json_encode($array, JSON_PRETTY_PRINT);
  file_put_contents("base.json", $array);
}

function buscarEmail($email)
{
  $usuarios = file_get_contents("base.json");
  $array = json_decode($usuarios, true);
  foreach ($array["usuarios"] as $usuario) {
    if ($email == $usuario["email"]) {
      return $usuario;
    }
  }
  return null;
}

function existeUsuario($email)
{

  return buscarEmail($email) !== null;
}

//VALIDAR LOGIN
function validarLogin($datos) {

$errores = [];
$datosTrim = [];

foreach ($datos as $posicion => $valor){
  $datosTrim[$posicion] = trim($valor);
}

//EMAIL
if (strlen($datosTrim["email"]) == 0){
$errores["email"] = "El email no puede estar vacio";}
 else if (filter_var($datosTrim["email"], FILTER_VALIDATE_EMAIL) == false){
  $errores["email"] = "El formato del email no es valido";}
  else if (!existeUsuario($datosTrim["email"])){
  $errores["email"] = "El email no se encuentra registrado";}
//Password
if (strlen($datos["pass"]) == 0){
  $errores["pwd"] = "La contraseña no puede estar vacia";}

  return $errores;
}


function loguearUsuario($email){
  $_SESSION["email"] = $email;
}

function traerUsuarioLogueado(){
  if(isset($_SESSION["email"])){
  return buscarEmail($_SESSION["email"]);
  }
  return false;
}

function usuarioLogueado(){
  return isset($_SESSION["email"]);
}

?>
