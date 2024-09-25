<?php
$correctPassword = 'B1llcl34n'; // Cambia esto por la clave que desees

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $password = $_POST['password'];

               if ($password === $correctPassword) {
                              // Inicia el buffer de salida y la sesión antes de cualquier salida
                              ob_start();
                              session_start();

                              // Redirige a la página HTML deseada
                              header("Location: /BIllclean/inventario/index.html");
                              exit();

                              // Finaliza el buffer de salida
                              ob_end_flush();
               } else {
                              echo 'Contraseña incorrecta';
               }
}
?>