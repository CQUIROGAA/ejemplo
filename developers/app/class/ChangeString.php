<?php
namespace App\Controllers;

class ChangeString {
    
    public function build($cadena) {
        if(isset($cadena) && empty($cadena)) {
            return 'Cadena vacía.';
        }
        $abc = 'abcdefghijklmnñopqrstuvwxyz';
        $abcUpper = strtoupper($abc);
        $nuevaCadena = '';
        
        if(strlen($cadena) == 0){
            echo 'Cadena vacía..';
            return;
        }
        
        for($i = 0; $i < strlen($cadena); $i++) {
            $letra = substr($cadena, $i, 1);
            
            if(strpos((ctype_upper($letra)) ? $abcUpper : $abc, $letra) !== false) {
                $posicion = strpos((ctype_upper($letra)) ? $abcUpper : $abc, $letra) + 1;
                $letraSiguiente = substr((ctype_upper($letra)) ? $abcUpper : $abc, 
                    ($posicion == 28) ? 0 : $posicion, 1);
            } else {
                $letraSiguiente = $letra;
            }

            $nuevaCadena = $nuevaCadena . $letraSiguiente;
            
        }
        return 'Entrada: ' . $cadena . ' - Salida: ' . $nuevaCadena;
    }
}
?>
