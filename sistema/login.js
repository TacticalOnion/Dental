// Ver u ocultar contraseña
function hideOrShowPassword() {
  var password1, check;
  
  password1 = document.getElementById("strContrasena");
  check = document.getElementById("ver1");
  
  if (check.checked == true) {
    password1.type = "text";
  } else {
    password1.type = "password";
  }
}



