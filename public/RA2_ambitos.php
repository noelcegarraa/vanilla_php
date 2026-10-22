<?php
  function mostrarCiclo() {
    $nombreCiclo = "Desarrollo de Aplicaciones Web";
    echo '<p>', $nombreCiclo, '</p>';
  }

  mostrarCiclo();

  //echo $nombreCiclo;   // Warning: Undefined variable $nombreCiclo
  //Ocurre porque esa variable solo existe dentro de la funcion.
?>
<?php
  $totalCiclosMostrados = 0;

  function registrarVisita() {
    global $totalCiclosMostrados;
    $totalCiclosMostrados++;
  }

  registrarVisita();
  registrarVisita();
  registrarVisita();

  echo '<p>Ciclos mostrados: ', $totalCiclosMostrados, '</p>';   // 3
?>
<?php
  define('NOMBRE_CENTRO', 'CIFP Carlos III');

  function pie() {
    // Sin "global": las constantes son accesibles en cualquier ámbito
    echo '<footer>', NOMBRE_CENTRO, '</footer>';
  }

  pie();
?>
<?php
  function contadorVisitas() {
    static $visitas = 0;
    $visitas++;
    echo '<p>Visita número ', $visitas, '</p>';
  }

  contadorVisitas();   // Visita número 1
  contadorVisitas();   // Visita número 2
  contadorVisitas();   // Visita número 3
//Se reinicia ya que las variables son volatiles. Si quisiesemos que se guardase su valor anterior necesitariamos algo externo como una base de datos.


//5
//Las variables superglobales son arrays que ya estan predefinidos y estan disponibles en todo el codigo
//$_COOKIE
//$_ENV
//Su ambito se parece ya que ambos los puedes usar en todo el codigo.
?>