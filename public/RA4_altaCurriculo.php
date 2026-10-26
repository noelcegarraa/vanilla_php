<?php
/* Comentarios responiendo a las preguntas
4.
    - 303 See other. Location: RA4_curriculos.php Y set_cookies: ultimo_ciclo=SMR; expires=Sun, 22 Nov 2026 10:10:23 GMT; Max-Age=2592000; HttpOnly; SameSite=Lax
    Despúes viene el GET de la página donde se ha redirigido (RA4_curriculos.php).
    - Al recargar aparece solo el GET. No me lo pregunta porque se ha redirigido automaticamente y solo recarga una solicitud GET no POST.
    - Aparece el último que elegí (SMR). En chrome esta fecha 2026-11-22T10:10:23.340Z. El nombre de la cookie de sesión es esta: PHPSESSID.
    - Al abrirla en incógnito no me aparecen porque no tengo ninguna cookie.
    - Al borrar la cookie de sesión ya no tengo los currículos que tenía en la sesión anterior. Al borrar la cookie de sesión, la sesión en el servidor se cerrará también.
    - Al poner FP ya no me aparece la línea de texto que aparecía el nombre y el currículo, el resto me sale igual.

    - Investigación:
  
    ¿Recibe el servidor su contenido en cada petición?
     NO. A diferencia de las cookies, Web Storage es 100% del cliente. El servidor 
     no ve estos datos a menos que los envíes manualmente mediante JavaScript (Fetch/Axios).
  
    ¿Sirve para guardar el ID de sesión de forma segura usando HttpOnly?
     NO. Web Storage no tiene equivalente a HttpOnly. Es accesible por JavaScript, 
     lo que expone el ID de sesión a robos si hay una vulnerabilidad XSS. 
     Para sesiones seguras, usa cookies con las flags 'HttpOnly' y 'Secure'.
  
    Diferencia clave: Las cookies viajan en cada petición HTTP (máx. 4KB). 
     Web Storage no viaja solo y ofrece mayor capacidad (5-10MB).
 */

declare(strict_types=1);

require_once __DIR__ . '/../src/RA4_comun.php';

session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax',
]);

$ciclos    = catalogoCiclos();
$validador = new ValidadorCurriculo($ciclos);
$datos     = [];
$errores   = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos   = $_POST;
    $errores = $validador->validar($datos);

    if ($errores === []) {
        $curriculos = $_SESSION['curriculos'] ?? [];
        $curriculo  = $validador->crearCurriculo($datos, count($curriculos) + 1);

        // En la sesión guardamos los datos, no el objeto: el listado lo reconstruirá.
        $curriculos[] = [
            'alumno' => $curriculo->alumno,
            'ciclo'  => $curriculo->ciclo->codCiclo,
            'video'  => $curriculo->videoCurriculum ?? '',
        ];
        $_SESSION['curriculos'] = $curriculos;
        $_SESSION['mensaje']    = 'Currículo dado de alta: ' . $curriculo->descripcion();

        // Recordamos el ciclo elegido durante 30 días para proponerlo la próxima vez.
        setcookie('ultimo_ciclo', $curriculo->ciclo->codCiclo, [
            'expires'  => time() + 60 * 60 * 24 * 30,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        // POST/Redirect/GET: el navegador pedirá el listado con GET.
        header('Location: RA4_curriculos.php', true, 303);
        exit;
    }
}

// Ciclo que aparece elegido: el que se acaba de enviar o, si no, el de la cookie.
$cicloElegido = $datos['ciclo'] ?? $_COOKIE['ultimo_ciclo'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Alta de currículo — <?= NOMBRE_CENTRO ?></title>
</head>
<body>
<h1><?= NOMBRE_CENTRO ?> — Alta de currículo</h1>

<?php if ($errores !== []): ?>
    <ul class="errores">
    <?php foreach ($errores as $error): ?>
        <li><?= e($error) ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="RA4_altaCurriculo.php" method="post">
    <p>
    <label>Alumno
        <input name="alumno" value="<?= e($datos['alumno'] ?? '') ?>">
    </label>
    </p>
    <p>
    <label>Ciclo
        <select name="ciclo">
        <option value="">— Elige un ciclo —</option>
        <?php foreach ($ciclos as $codigo => $ciclo): ?>
            <option value="<?= e($codigo) ?>" <?= $cicloElegido === $codigo ? 'selected' : '' ?>><?= e($ciclo->descripcion()) ?></option>
        <?php endforeach; ?>
        </select>
    </label>
    </p>
    <p>
    <label>Vídeo de presentación (opcional)
        <input name="video" type="url" value="<?= e($datos['video'] ?? '') ?>">
    </label>
    </p>
    <button type="submit">Dar de alta</button>
</form>

<p><a href="RA4_curriculos.php">Ver los currículos dados de alta</a></p>
</body>
</html>