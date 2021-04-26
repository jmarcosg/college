<?php
include 'Login.php';
$valida = false;
$login = new Login("Juanma", "test1234", "cipo1234");

while (!$valida) {
    echo "Ingrese su contraseña: ";
    $contrasenia = trim(fgets(STDIN));
    if ($login->contraseniaValida($contrasenia)) {
        $valida = true;
    } else {
        echo "Contraseña incorrecta\n";
    }
}
echo "Bienvenido " . $login->getNombreUsuario() . "\n";

echo "Desea cambiar su contraseña? (s/n) ";
$opcion = trim(fgets(STDIN));

if ($opcion == 's') {
    cambioDeContrasenia($login);
}

$login->cambiarContrasenia("Gauss");
$login->cambiarContrasenia("Euler");

cambioDeContrasenia($login);

/**
 * MODULO cambioDeContrasenia
 */
function cambioDeContrasenia($login)
{
    do {
        echo "Ingrese la nueva contraseña: ";
        $nuevaContrasenia = trim(fgets(STDIN));
    } while (!$login->cambiarContrasenia($nuevaContrasenia));

    echo "Ingrese la nueva frase para ayudar a recordar la contraseña: ";
    $nuevaFrase = trim(fgets(STDIN));
    $login->setFraseAyuda($nuevaFrase);
}
