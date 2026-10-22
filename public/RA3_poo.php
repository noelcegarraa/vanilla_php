<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/Curriculo.php';

$daw = new Ciclo(1, 'DAW', 'Desarrollo de Aplicaciones Web', Ciclo::GRADO_SUPERIOR);
$curriculo = new Curriculo(1, 'Ana López', $daw, 'https://youtu.be/curriculo1');

$mismoCurriculo = $curriculo;   // no es una copia: es el mismo objeto
$mismoCurriculo->publicar();  //Aparecerá como TRUE, ya que es el mismo objeto

//$daw->codCiclo = 'DAM';
//new Modelo(2); 
//echo Ciclo::GRADO_SUPERIRO;
//Si descomento esto dará error  porque no se pueden cambiar los valores que están como readonly en el constructor.
?>
<h1><?= $daw->descripcion() ?></h1>
<p>Titulación: <?= $daw->titulacion() ?></p>
<p><?= $curriculo->descripcion() ?>: <?= $curriculo->estaPublicado() ? 'publicado' : 'en borrador' ?></p>

<!-- Un ENUM es un tipo de clase que permite definir un conjunto cerrado de valores posibles para un tipo. Un backed Enum permite poner un valor diferente con el que se
 llamará a esa valor.
 Lo escribiría así:
 enum Grado: string {
    case Medio = 'Técnico';
    case Superior = 'Técnico superior';
 
 }

 Sería mejor usar esto más que el readonly $grado porque con el ENUM limitas a que solo sea una de estas dos opciones además de que de esta manera
 es mucho más legible y con menos código.
 -->