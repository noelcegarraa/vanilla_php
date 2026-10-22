<?php
   $ciclos = ['DAW', 'DAM'];
   $ciclos[] = 'ASIR';

   echo '<p>Número de ciclos: ', count($ciclos), '</p>';
   echo '<p>', in_array('SMR', $ciclos, true) ? 'SMR ofertado' : 'SMR no ofertado', '</p>';
 ?>
 <?php
  $ciclo = [
    'codCiclo' => 'DAW',
    'nombre'   => 'Desarrollo de Aplicaciones Web',
    'modulos'  => [
      '0612' => 'Desarrollo web en entorno cliente',
      '0613' => 'Desarrollo web en entorno servidor',
      '0614' => 'Despliegue de aplicaciones web',
      '0615' => 'Diseño de interfaces web',
    ],
  ];

  echo $ciclo['modulos']['0613'];   // Desarrollo web en entorno servidor
?>
<?php
  echo '<ul>';
  foreach ($ciclo['modulos'] as $codigo => $nombre) {
    echo '<li class="modulo">', $codigo, ' — ', $nombre, '</li>';
  }
  echo '</ul>';
?>
<?php
  echo '<pre>';
  print_r($ciclo);
  echo '</pre>';
?>
<?php
  $curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
  ];
?>
 <?php
   $alumnos = array_column($curriculos, 'alumno');
   sort($alumnos);
   echo '<p>Alumnos: ', implode(', ', $alumnos), '</p>';

   //Ana, Laura y Marcos es el orden que espero.
 ?>
<?php
  ['alumno' => $alumno, 'ciclo' => $codCiclo] = $curriculos[1];
  echo '<p>Segundo currículo: ', $alumno, ' (', $codCiclo, ')</p>';
?>
<?php
  $copia = $curriculos;
  $copia[] = ['alumno' => 'Pablo Ruiz', 'ciclo' => 'DAW', 'video' => ''];

  echo '<p>Original: ', count($curriculos), ' · Copia: ', count($copia), '</p>';
 
?>
<!-- 
Con el sort te muestra el índice con su valor y ordena por la nota de menor a mayor.
Con el asort muestra el nombre (no el índica) y muestra la nota ordenada de menor a mayor.
Con el ksort te lo ordena por los nombres de los alumnos y no por la nota.

El ksort sería un problema porque quiero ordenador por nota y no por nombre.

Código con el que he comprado esto: (Faltan las etiquetas de apertura y cierre de php)

$notas = ['Marcos Pérez' => 7.25, 'Laura García' => 9, 'Ana López' => 8.5];
$copia1 = $notas;
sort($copia1);
print_r($copia1);
echo '<br>';
$copia2 = $notas;
asort($copia2);
print_r($copia2);
echo '<br>';
$copia3 = $notas;
ksort($copia3);
print_r($copia3);

-->