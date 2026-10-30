<?php
declare(strict_types=1);

require_once __DIR__ . '/Curriculo.php';

/**
 * Cuenta cuántos currículos hay de cada ciclo.
*
* @param list<Curriculo> $curriculos
* @return array<string, int> Código del ciclo => número de currículos, en orden de aparición.
*/
function contarPorCiclo(array $curriculos): array
{
    $cuenta = [];
    foreach ($curriculos as $curriculo) {
        $codigo = $curriculo->ciclo->codCiclo;
        $cuenta[$codigo] = isset($cuenta[$codigo]) ? ++$cuenta[$codigo] : 1; //El segundo DAW no se sumaba. Al poner el ++ como prefijo hace la suma antes de terminar.
    }
/* EJERCICIO 5. DEBUG TEST
Al ejectutar el test da error con el comando dado (docker compose exec -e XDEBUG_TRIGGER=1 --workdir /var/www/vanilla_php workspace vendor/bin/phpunit tests/RA4_3_XdebugTest.php)
Para que funcione había que indicar expresamente a donde se tenía que dirigir. Comando correcto: 
docker compose exece XDEBUG_TRIGGER=1 -e XDEBUG_CONFIG="client_host=172.17.0.1" --workdir /var/www/vanilla_php workspace vendor/bin/phpunit tests/RA4_3_XdebugTest.php
Una vez arreglado esto, la funcion la llama "RA4_3_XdebugTest - > test_contarPorCilo_cuenta_cada_ciclo"
El resto de la pila de llamadas muestra los del framework.

6. INVESTIGACION
 Si $total vale 0, PHP lanza un 'DivisionByZeroError'. 
  Es un error que ocurre al usar 0 como divisor.
 
 La protegería añadiendo un condicional al inicio para retornar 0 si el total es 0.

*/

    return $cuenta;
}

/** Porcentaje (redondeado a entero) que representa $parte sobre $total. */
function porcentaje(int $parte, int $total): int
{
    return (int)(($parte / $total) * 100); //usando intdiv me truncaba los decimales. Por lo que para luego multiplicar por 100 no daba bien.
}