<?php
declare(strict_types=1);

require_once __DIR__ . '/Curriculo.php';

/**
 * Valida los datos del formulario de alta de un currículo y, si son
* válidos, construye con ellos el objeto Curriculo.
*/
class ValidadorCurriculo
{
    /**
     * @param array<string, Ciclo> $ciclos Ciclos que ofrece el centro, indexados por su código.
    */
    public function __construct(
        private readonly array $ciclos,
    ) {
    }

    /**
     * @param array<string, mixed> $datos Datos recibidos, normalmente $_POST.
    * @return array<string, string> Errores por campo; vacío si los datos son válidos.
    */
    public function validar(array $datos): array
    {
        $errores = [];

        $alumno = trim($datos['alumno'] ?? ''); //Si escribo el nombre con espacio al princpio o final, se hace el trim y quita esos espacios.
        if ($alumno === '') { //Aquí usaría el required
            $errores['alumno'] = 'El nombre del alumno es obligatorio.'; //Si lo dejo todo en blanco salta este error. 
        } elseif (mb_strlen($alumno) > 100) {  //Aquí el max:value
            $errores['alumno'] = 'El nombre del alumno no puede superar los 100 caracteres.';
        }

        $codCiclo = $datos['ciclo'] ?? '';
        if (!array_key_exists($codCiclo, $this->ciclos)) {  // Aqui usaria "in" ya que el campo bajo validacion debe estar incluido en la lista de valores
            $errores['ciclo'] = 'Elige uno de los ciclos de la lista.'; //Este también salta. Si introduzco el nombre y no un ciclo también se muestra.
        }

        $video = trim($datos['video'] ?? '');
        if ($video !== '' //En estas tres validaciones usaaaría nullable, url y starts-with.
            && (filter_var($video, FILTER_VALIDATE_URL) === false || !str_starts_with($video, 'https://'))) {
            $errores['video'] = 'El vídeo debe ser una URL que empiece por https://'; //Si no pongo HTTPS salta este error. Si pongo javascript..etc también salta esto
            //Y gracias a usar la funcion e() eso no se ejecuta y lo toma como caracteres normales pasa esto aunque cambia el type='url' a text por ejemplo.
        }
            //Al cambiar el value de un campo de un formulario se cambia lo escrito y se envía eso.
            //Si pongo todo correcto se crea el curriculo y me da la opcion de ver el video o crear otro curriculo.
            //Si no pongo video me dice que el video debe empezar por htpps://
        return $errores;
    }
    /*
    $validarDatos = $request->validate([
    'alumno' => ['required', 'max:100'],
    'ciclo' => ['in'],
    'published_at' => ['nullable', 'url' ,'starts-with('https://')'],
]);
    */

    /**
     * Construye el currículo a partir de datos que ya han pasado validar().
    *
    * @param array<string, mixed> $datos
    */
    public function crearCurriculo(array $datos, int $id): Curriculo
    {
        $video = trim($datos['video'] ?? '');

        return new Curriculo(
            $id,
            trim($datos['alumno']),
            $this->ciclos[$datos['ciclo']],
            $video === '' ? null : $video,
        );
    }
}