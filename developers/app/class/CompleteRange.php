<?php
namespace App\Controllers;

class CompleteRange{
    
    public function build($coleccion) {
        if(isset($coleccion) && empty($coleccion)) {
            return 'Cadena vacía.';
        }
        $coleccion = json_decode($coleccion);
        $ultimoNumero = $coleccion[count($coleccion) - 1];
        $resultado = array($ultimoNumero);
        
        $numero = 0;
        $numeroSig = 0;
        $j = 0;
        for($i = 0; $i < count($coleccion) - 1; $i++) {
            $numero = $coleccion[$i];
            $numeroSig = $coleccion[$i + 1];
            $resultado[$j] = $numero;
            $j = $j + 1;
            if($numero + 1 < $numeroSig) {
                $n = $numero + 1;
                while($n < $numeroSig){
                    $resultado[$j] = $n;
                    $n = $n + 1;
                    $j = $j + 1;
                }
            }
        }
        $resultado[$j] = $coleccion[count($coleccion) - 1];
        
        //sort($coleccion, SORT_REGULAR);
        
        return 'Entrada: [' . implode(', ', $coleccion) . '] - Salida: [' . implode(', ', $resultado) . ']';
    }
}
?>
