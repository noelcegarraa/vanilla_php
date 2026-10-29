<?php
/*
6. 
    - Me lleva a login.php. Pasa esto porque exigimos el login.
    - Si pongo una contraseña incorrecta me pone el mensaje de "email o contraseña incorrectos". Si pongo el email mal y contraseña bien sale el mismo mensaje.
    El email sigue quedando escrito. Esto es porque el campo email tiene un valor value y contraseña no.
    - Valor de PHPSESSID antes de iniciar sesión: 85e223f53fab977055313144349d4c3d. Nuevo PHPSESSID al iniciar sesión: 2d4421be7ead9658191165df9eb969d4.
    Se cambia la sesión porque tenemos puesto que cuando se verifique la autenticación se haga un session_regenerate_id(true).
    - Si intento cambiar a login.php una vez estoy autenticado, me manda a perfil.php. Esto pasa porque en login.php tenemos que si el usuario actuales existe,
    rediriga a perfil.php
    - Al cerrar sesión no me deja volver atrás. Me exige iniciar sesión.
    - Al iniciar sesión con elena me aparece el rol de docente

    INVESTIGACIÓN:

    No se guardan el email y la contraseña en una cookie porque si alguien roba esa cookie (por malware o hackeos), tendría tus credenciales reales para siempre y 
    podría usarlas para entrar en otras páginas web. Y recordemos que las cookies al estar en el cliente son más vulnerables y menos seguras.

    Cómo se hace de forma segura:

    1. En el navegador (Cookie protegida): Se guarda un texto aleatorio e indescifrable (llamado token) dentro de una cookie configurada con propiedades de máxima 
    seguridad (HttpOnly y Secure), lo que impide que los scripts maliciosos la puedan leer.

    2. En el servidor (Base de datos): El servidor solo guarda el hash (la huella digital) de ese token, nunca el token real. Si hackean la base de datos de la empresa, 
    los atacantes solo verán códigos inservibles.

    3. Al volver a entrar: El navegador envía el token, el servidor le aplica el algoritmo de hash y, si coincide con lo que tiene guardado, te deja pasar sin pedirte 
    la contraseña. Por seguridad, muchas aplicaciones borran ese token y te dan uno nuevo cada vez que entras.

*/

declare(strict_types=1);

require_once __DIR__ . '/../src/RA4_comun.php';

iniciarSesion();
$usuario = exigirLogin();

$mensaje = $_SESSION['mensaje'] ?? null;
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi área — <?= NOMBRE_CENTRO ?></title>
</head>
<body>
<h1><?= NOMBRE_CENTRO ?> — Mi área</h1>

<?php if ($mensaje !== null): ?>
    <p class="exito"><?= e($mensaje) ?></p>
<?php endif; ?>

<p>Usuario: <?= e($usuario['firstName'] . ' ' . $usuario['lastName']) ?></p>
<p>Email: <?= e($usuario['email']) ?></p>
<p>Rol: <?= e($usuario['rol']) ?></p>

<form action="RA4_logout.php" method="post">
    <button type="submit">Cerrar sesión</button>
</form>
</body>
</html>