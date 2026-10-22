<?php

 $grado = 'Superior';

  if ($grado === 'Superior') {
    echo '<p>Ciclo de Grado Superior: da acceso a la universidad.</p>';
  } elseif ($grado === 'Medio') {
    echo '<p>Ciclo de Grado Medio: da acceso a un Grado Superior.</p>';
  } else {
    echo '<p>Grado desconocido.</p>';
  }
?>

<?php
  $videoCurriculum = 'https://youtu.be/curriculo1';
  $textoCurriculum = '';
    //Espero el mensaje de curículo vacío. 
  if ($videoCurriculum !== '' && $textoCurriculum !== '') {
    echo '<p>Currículo completo</p>';
  } elseif ($videoCurriculum !== '' || $textoCurriculum !== '') {
    echo '<p>Currículo incompleto</p>';
  } else {
    echo '<p>Currículo vacío</p>';
  }
?>
<?php
  $codFamilia = 'INF';

  $familia = match ($codFamilia) {
    'INF'   => 'Informática y Comunicaciones',
    'ADG'   => 'Administración y Gestión',
    'COM'   => 'Comercio y Marketing',
    default => 'Familia desconocida',
  };

  echo '<p>Familia profesional: ', $familia, '</p>';
?>
<?php
  $grado = 'Superior';
  $titulo = $grado === 'Superior' ? 'Técnico Superior' : 'Técnico';
  echo '<p>Titulación: ', $titulo, '</p>';
?>
<?php
  $curriculo = ['alumno' => 'Ana López', 'ciclo' => 'DAW'];

  echo '<p>Vídeo: ', $curriculo['video'] ?? 'Sin vídeo de presentación', '</p>';
?>
<?php $publicado = true; ?>

<?php if ($publicado): ?>
  <p class="estado">Currículo publicado</p>
<?php else: ?>
  <p class="estado">Currículo en borrador</p>
<?php endif; ?>
<?php
//No aparece. Aparece currículo publicado.
//En estos casos sería FALSE:
/*
the boolean false itself

the integer 0 (zero)

the floats 0.0 and -0.0 (zero)

the empty string "", and the string "0"

an array with zero elements

the unit type NULL (including unset variables)

Internal objects that overload their casting behaviour to bool. For example, GMP objects representing the value 0.

¿Qué mostraría 

if ('0') ---- FALSE

{ echo 'sí'; } else { echo 'no'; }?  TRUE

¿Y if ('0.0')? FALSE

Preferimos hacerlo explicitamente porque es más legible y menos lioso para el programador.
*/
?>