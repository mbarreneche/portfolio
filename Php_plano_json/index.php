<?php

require_once("funciones.php");

if ($_POST && isset($_POST["register"])) {

  $errores = validarRegistro($_POST);
  $nameOk = $_POST["name"];
  $lastNameOk = $_POST["lastName"];
  $emailOk = $_POST["email"];


  if (empty($errores)) {
    if (!existeUsuario($_POST["email"])) {

      $usuario = armarUsuario($_POST);   //crear usuario//
      guardarUsuario($usuario);  //guardar usuario//
      header("Location:bienvenida.php");
      exit;
    }
  }
}



if ($_POST && isset($_POST["login"])) {
  $erroresLogin = validarLogin($_POST);


  //Si no hay errores
  if (empty($erroresLogin)) {

    loguearUsuario($_POST["email"]);
    
    //Redirigimos a home
    header("Location:index.php");
    exit;
  }
}
$usuario = traerUsuarioLogueado();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <nav class="navibar">
    <a class="navibar__home-link" href="index.php"><i class="fas fa-home fa-2x"></i></a>
    <ul class="navibar__list">
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#home">Inicio</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#descripcion">Descripcion</a></li>
      <?php if (usuarioLogueado()) : ?>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="perfil.php"><?php echo "$usuario[name]";  ?></a></li>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="logout.php">Logout</a></li>
      <?php else : ?>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="#login">Login</a></li>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="#register">Registro</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <main class="content" id="home">
    <section class="presentacion">
      <h1 class="presentacion__title">Ejemplo para muestra</h1>
      <p class="presentacion__subtitle">Uso de php plano para registrar y loguear usuario a traves de un archivo json</p>
      <a href="#descripcion" class="presentacion__arrow-down grow point"><i class="fas fa-chevron-circle-down fa-4x"></i></a>
    </section>

    <section class="descripcion" id="descripcion">
      
    <?php if (usuarioLogueado()) : ?><h1 href="#login">Hola <?php echo "$usuario[name] $usuario[lastName]"  ?></h1><?php endif; ?>
      <?php if (!usuarioLogueado()) : ?><a class="btn descripcion__start-btn" href="#register"><span>Registrame</span></a><?php endif; ?>
    </section>
    <?php if (!usuarioLogueado()) : ?>
      <section class="login-section" id="login">
        <form class="form" action="index.php#login" method="POST">
          <h1 class="form__title">Login</h1>
          <div class="form__group">
            <label class="form__group__text-label" for="email">Email:</label>
            <input class="form__group__text-field" type="email" name="email" id="email" placeholder="Ingrese su correo electronico" required>
          </div>
          <?php if (!empty($erroresLogin["email"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $erroresLogin["email"]; ?>
            </div>
          <?php } ?>

          <div class="form__group">
            <label class="form__group__text-label" for="pwd">Contraseña:</label>
            <input class="form__group__text-field" type="password" name="pwdlogin" id="pwd" placeholder="Password">
          </div>
          <?php if (!empty($erroresLogin["pwd"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $erroresLogin["pwd"]; ?>
            </div>
          <?php } ?>


          <button type="submit" class="form__btn submit" name="login" value="ingresar">Login</button>

          <p class="form__not-registered">¿No tenés cuenta?<a class="form__not-registered__link" href="#register">Registrate</a></p>
          <input type="hidden" name="login" value="">
        </form>
      </section>
    <?php endif; ?>

    <?php if (!usuarioLogueado()) : ?>
      <section class="register-section" id="register">
        <form class="form" action="index.php#register" method="post">
          <h1 class="form__title">Registrate</h1>
          
<!-- NOMBRE -->
          
          <div class="form__group">
            <label class="form__group__text-label" for="name">Nombre</label>
            <input id="name" class="form__group__text-field" name="name" type="text" value=""
            <?php if (isset($nameOk) && empty($errores["name"])) { echo $nameOk;
                  } ?> placeholder="Ingresá tu nombre">
          </div>
          <div id="ok_name" class="ok"></div>
          <div id="error_name" class="error"></div>
          <?php if (!empty($errores["name"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $errores["name"]; ?>
            </div>
          <?php } ?>

<!-- APELLIDO -->

          <div class="form__group">
            <label class="form__group__text-label" for="lastName">Apellido</label>
            <input id="lastName" class="form__group__text-field" name="lastName" type="text" value=""
            <?php if (isset($lastNameOk) && empty($errores["lastName"])) {
              echo $lastNameOk;
            } ?> placeholder="Ingresá tu apellido">
          </div>
          <div id="ok_lastName" class="ok"></div>
          <div id="error_lastName" class="error"></div>
          <?php if (!empty($errores["lastName"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $errores["lastName"]; ?>
            </div>
          <?php } ?>

<!-- EMAIL -->

          <div class="form__group">
            <label class="form__group__text-label" for="email">Email</label>
            <input id="email" class="form__group__text-field" name="email" type="email" value="
            <?php if (isset($emailOk) && empty($errores["email"])) {
              echo $emailOk;
            } ?>" placeholder="Ingresá tu email">
          </div>
          <div id="ok_email" class="ok"></div>
          <div id="error_email" class="error"></div>
          <?php if (!empty($errores["email"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $errores["email"]; ?>
            </div>
          <?php } ?>

<!-- CONTRASEÑA -->

          <div class="form__group">
            <label class="form__group__text-label" for="pwd">Contraseña</label>
            <input id="pwd" class="form__group__text-field" name="pwd" type="password" placeholder="Password">
          </div>
          <div id="ok_password" class="ok"></div>
          <div id="error_password" class="error"></div>

<!-- RETYPE CONTRASÑEA -->

          <div class="form__group">
            <label class="form__group__text-label" for="password-confirmation">Repite Contraseña</label>
            <input id="password-confirmation" class="form__group__text-field" name="password-confirmation" type="password" placeholder="Password">
          </div>
          <div id="ok_password-confirmation" class="ok"></div>
          <div id="error_password-confirmation" class="error"></div>
          <?php if (!empty($errores["pwd"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $errores["pwd"]; ?>
            </div>
          <?php } ?>
          <div class="form__group form-check">
            <input id="accepted" name="accepted" class="form-check__input" type="checkbox" value="yes">
            <label class="form-check__label" for="accept">Acepto los términos y condiciones</label>
          </div>
          <?php if (!empty($errores["accepted"])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $errores["accepted"]; ?>
            </div>
          <?php } ?>
          <button class="form__btn" type="submit" name="register">Registrarme</button>
          <input type="hidden" name="register" value="">
        </form>
      </section>
    <?php endif; ?>
  </main>
  <script src="registerValidation.js"></script>
</body>

</html>
