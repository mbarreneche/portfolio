<?php

require_once("funciones.php");

if (!usuarioLogueado()) {
  header("Location:index.php");
}
$usuario = traerUsuarioLogueado();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/profile.css">
</head>

<body>
  <nav class="navibar">
    <a class="navibar__home-link" href="index.php"><i class="fas fa-home fa-2x"></i></a>
    <ul class="navibar__list">
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php">Inicio</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#descripcion">Descripcion</a></li>
      <?php if (usuarioLogueado()) : ?>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="perfil.php"><?php echo "$usuario[name]";  ?></a></li>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="logout.php">Logout</a></li>
      <?php else : ?>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#login">Login</a></li>
        <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#register">Registro</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <section class="profile">
    
    <div class="profile__info">
      
      <div class="profile__info__data">
        <ul class="profile-data__list">
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Nombre:</span>
            <span class="profile-data__list__item__data"><?php echo "$usuario[name]";  ?></span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Apellido:</span>
            <span class="profile-data__list__item__data"><?php echo "$usuario[lastName]";  ?></span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Email:</span>
            <span class="profile-data__list__item__data"><?php echo "$usuario[email]";  ?></span>
          </li>
        </ul>
      </div>
    </div>
    
            >
          </div>
        </form>
    </div>
  </section>

</body>

</html>
