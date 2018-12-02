<?php
mb_internal_encoding("UTF-8");
try {
  /* filter_input(INPUT_POST, "nombre1")
   * Lee el parámetro "nombre1" que recibe del
   * <dfn>agente de usuario</dfn> (navegador o móvil). En este caso, al
   * usar el método POST para leer parámetros, lo busca en un archivo que
   * acompaña a la URL. */
  $nombre1 = trim(filter_input(INPUT_POST, "nombre1"));
  $nombre2 = trim(filter_input(INPUT_POST, "nombre2"));
  if (!$nombre1) {
    throw new Exception("Falta el nombre 1");
  } elseif (!$nombre2) {
    throw new Exception("Falta el nombre 2");
  }
  $respuesta = "Saludos a $nombre1 y a $nombre2.";
  muestraRespuesta($respuesta);
} catch (Exception $e) {
  muestraRespuesta($e->getMessage());
}
/** Devuelve al agente de usuario un texto. El agente de usuario recibe un
 * archivo que contiene la respuesta y encabezados que describen sus
 * características.
 * @param string $respuesta texto que se devuelve. */
function muestraRespuesta($respuesta) {
  // Indica que la información devuelta tiene el formato de texto plano.
  header('Content-type: text/plain');
  echo $respuesta;
}