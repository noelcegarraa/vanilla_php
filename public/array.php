<?php 

$estudiantes = ['Lopez', 'Perez', 'Ruiz', 'Garcia'];

$buscado = 'Perez';

$i=0;
$apellidoEncontrado = false;

while ($apellidoEncontrado == false && $i < count($estudiantes)){
    if($estudiantes[$i] === $buscado){
        $apellidoEncontrado = true;
    } else {
        $i++;
    }
}
if($apellidoEncontrado){
    echo '<p>El apellido SI está en el array</p>';
} else {
    echo '<p>El apellido NO está en el array</p>';
}

?>
