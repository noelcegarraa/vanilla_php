<?php
function validarCiclo(array $datos): array {
    $errores = [];
    $codCiclo = trim($datos['codCiclo'] ?? '');
    if ($codCiclo === '') {
        $errores['codCiclo'] = 'El código del ciclo es obligatorio.';
    } elseif (!ctype_upper($codCiclo) || strlen($codCiclo) > 5) {
        $errores['codCiclo'] = 'El código debe tener como máximo 5 letras mayúsculas.';
    }
    // ... nombre y grado, con la misma idea ...
    $horas = filter_var($datos['horas'] ?? '', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1000, 'max_range' => 2000],
    ]);
    if ($horas === false) {
        $errores['horas'] = 'Las horas deben ser un número entero entre 1000 y 2000.';
    }
    return $errores;
}
  function e(string $texto): string
  {
      return htmlspecialchars($texto);
  }

if(! empty($_POST)) {
    $errores = validarCiclo($_POST);
}

 header("location: http://localhost/RA3_formasEnvio.php?errores=" . count($errores)); /* Redirect browser */


 exit;
?>
<html>
    sdasdasd
</html>