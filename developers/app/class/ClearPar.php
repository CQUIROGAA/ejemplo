<?php
namespace App\Controllers;

class ClearPar {
    
    public function build($cadena) {
        if(isset($cadena) && empty($cadena)) {
            return 'Cadena vacía.';
        }
        $nueva = "";
        $pareja = array(0 => '(', 1 => ')');
        $open = true;
        for($i = 0; $i < strlen($cadena); $i++) {
            if($open) {
                if(substr($cadena, $i, 1) == $pareja[0]) {
                    $nueva = $nueva . $pareja[0];
                    $open = false;
                }
            } else {
                if(substr($cadena, $i,1) == $pareja[1]) {
                    $nueva = $nueva . $pareja[1];
                    $open = true;
                }
            }
        }

        if ($open == false) {
            $nueva = $nueva.substr(0, strlen($nueva) - 1);
        }
        return "Entrada: " . $cadena . " - Salida: " . $nueva;
    }
}
?>
