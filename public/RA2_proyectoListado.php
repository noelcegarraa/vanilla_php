	<?php
  define('NOMBRE_CENTRO', 'CIFP Carlos III');
 
?>
<?php
  $curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1', 'foto' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixid=M3w4MjcwNjd8MHwxfHNlYXJjaHwyfHxwZW9wbGV8ZW58MHx8fHwxNzkwNjY4MDQzfDA&ixlib=rb-4.1.0&fit=max&q=80'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2', 'foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=M3w4MjcwNjd8MHwxfHNlYXJjaHwzfHxwZW9wbGV8ZW58MHx8fHwxNzkwNjY4MDQzfDA&ixlib=rb-4.1.0&fit=max&q=80'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3', 'foto' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixid=M3w4MjcwNjd8MHwxfHNlYXJjaHw0fHxwZW9wbGV8ZW58MHx8fHwxNzkwNjY4MDQzfDA&ixlib=rb-4.1.0&fit=max&q=80'],
    ['alumno' => 'Noel Cegarra', 'ciclo' => 'DAW', 'video' => 'https://youtu.be/curriculo4', 'foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixid=M3w4MjcwNjd8MHwxfHNlYXJjaHw3fHxwZW9wbGV8ZW58MHx8fHwxNzkwNjY4MDQzfDA&ixlib=rb-4.1.0&fit=max&q=80']
  ];
?>
<?php
  function mostrarCurriculo(array $curriculo) {
    echo '<li>', $curriculo['alumno'], ' — ', $curriculo['ciclo'],
         ' — <a href="', $curriculo['video'], '">vídeo</a>, <img src="',$curriculo['foto'],'"></li>';
  }
?>
<?php
  echo '<h1>', NOMBRE_CENTRO, ' — Currículos</h1>';
  echo '<ul>';
  /*
  mostrarCurriculo($curriculos[0]);
  mostrarCurriculo($curriculos[1]);
  mostrarCurriculo($curriculos[2]);
  */
  foreach ($curriculos as $suma1) {
    mostrarCurriculo($suma1);
  }
  echo '</ul>';
?>