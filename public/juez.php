<?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));
$numerosTotales = 0;
$i = 0;

while($datos[$i] != 0){
	$numerosTotales++;
  	$i++;
}
echo "Se han sumado ", $numerosTotales, " números, dando como resultado un total de ",
?>