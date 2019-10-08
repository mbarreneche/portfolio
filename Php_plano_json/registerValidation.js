// ----------- DEFINICION DE VARIABLES --------------

var nombre = document.querySelector('input[name=name]');
var apellido = document.querySelector('input[name=lastName]');
var email = document.querySelector('input[name=email]');
var contraseña = document.querySelector('input[name=password]');
var repiteContraseña = document.querySelector('input[name=password-confirmation]');

 // ---------------- SELECCIONANDO EL CAMPO DE LOS ERRORES Y LOS CHEKS ----------------

var nombre_error = document.getElementById("error_name");
var apellido_error = document.getElementById("error_lastName");
var email_error = document.getElementById("error_email");
var contraseña_error = document.getElementById("error_password");
var repiteContraseña_error = document.getElementById("error_password-confirm");

var nombre_ok = document.getElementById("ok_name");
var apellido_ok = document.getElementById("ok_lastName");
var email_ok = document.getElementById("ok_email");
var contraseña_ok = document.getElementById("ok_password");
var repiteContraseña_ok = document.getElementById("ok_password-confirm");

// -------------- AGREGANDO TODOS LOS EVENT LISTENER ------------------

var nombre_campo = nombre.addEventListener("blur", nombreVerify, true)
var apellido_campo = apellido.addEventListener("blur", apellidoVerify, true)
var email_campo = email.addEventListener("blur", emailVerify, true)
var contraseña_campo = contraseña.addEventListener("blur", contraseñaVerify, true)
var repiteContraseña_campo = repiteContraseña.addEventListener("blur", repiteContraseñaVerify, true)


 // ------------------ FUNCIONES VERIFY ----------------------

function nombreVerify() {

  if (nombre.value.startsWith(" ")) {
    nombre.style.border = "2px solid red";
    nombre_ok.innerHTML = ""
    nombre_error.innerHTML = "<span>El nombre no puede contener espacios en blanco al comienzo</span>";

  } else if ((nombre.value.match(/[0-9]/i)) && (nombre.value != "")){
  nombre.style.border = "2px solid red";
  nombre_ok.innerHTML = ""
  nombre_error.innerHTML = "<span>El nombre no puede contener numeros o acentos</span>";
   }
  
       else {
       nombre.style.border = "2px solid lime";
       nombre_ok.style.color = "lime";
       nombre_ok.innerHTML = "&#10004";
       nombre_error.innerHTML = "" }
    }


function apellidoVerify() {

  if (apellido.value.startsWith(" ")) {
    apellido.style.border = "2px solid red";
    apellido_ok.innerHTML = ""
    apellido_error.innerHTML = "<span>El apellido no puede contener espacios en blanco al comienzo</span>";

  } else if ((apellido.value.match(/[0-9]/i)) && (apellido.value != "")){
  apellido.style.border = "2px solid red";
  apellido_ok.innerHTML = ""
  apellido_error.innerHTML = "<span>El apellido no puede contener numeros o acentos</span>";
   }

       else {
       apellido.style.border = "2px solid lime";
       apellido_ok.innerHTML = "&#10004";
       apellido_ok.style.color = "lime";
       apellido_error.innerHTML = "" }
    }


function emailVerify() {

var regex = /(?!.*\.{2})^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

if (email.value.startsWith(" ")) {
    email.style.border = "2px solid red";
    email_ok.innerHTML = ""
    email_error.innerHTML = "<span>El email no puede contener espacios en blanco al comienzo</span>";

  }

   else if (!regex.test(email.value)) {
    email.style.border = "2px solid red";
    email_ok.innerHTML = ""
    email_error.innerHTML = "<span>El email no tiene formato valido</span>";
   }
  else {
    email.style.border = "2px solid lime";
    email_ok.innerHTML = "&#10004";
    email_ok.style.color = "lime";
    email_error.innerHTML = ""
  }}


function contraseñaVerify () {

  if (contraseña.value === "") {
    contraseña.style.border = "2px solid red";
    contraseña_ok.innerHTML = ""
    contraseña_error.innerHTML = "<span>La contraseña no puede estar vacia</span>";

  } else if (contraseña.value.length < 8) {
    contraseña.style.border = "2px solid red";
    contraseña_ok.innerHTML = ""
    contraseña_error.innerHTML = "<span>La contraseña debe tener al menos 8 caracteres</span>";
  } else {
    contraseña.style.border = "2px solid lime";
    contraseña_ok.innerHTML = "&#10004";
    contraseña_ok.style.color = "lime";
    contraseña_error.innerHTML = ""
  }
}


function repiteContraseñaVerify() {

    if (repiteContraseña.value === "") {
      repiteContraseña.style.border = "2px solid red";
      repiteContraseña_ok.innerHTML = ""
      repiteContraseña_error.innerHTML = "<span>La contraseña no puede estar vacia</span>";

    } else if (repiteContraseña.value.length < 8) {
      repiteContraseña.style.border = "2px solid red";
      repiteContraseña_ok.innerHTML = ""
      repiteContraseña_error.innerHTML = "<span>La contraseña debe tener al menos 8 caracteres</span>";
    } else if (contraseña.value != repiteContraseña.value) {
      repiteContraseña.style.border = "2px solid red";
      repiteContraseña_ok.innerHTML = ""
      repiteContraseña_error.innerHTML = "<span>Las contraseñas no coinciden</span>";
    } else {
      repiteContraseña.style.border = "2px solid lime";
      repiteContraseña_ok.innerHTML = "&#10004";
      repiteContraseña_ok.style.color = "lime";
      repiteContraseña_error.innerHTML = ""
    }
}

// ---------------- HACER QUE EL BOTON SUBMIT SOLO FUNCIONE SI ESTA TODO OK ------------------


// var boton = document.getElementById('submit_button');
//
//     boton.addEventListener('click', function(e) {
//     if () {
//     e.preventDefault();
//   }
// })