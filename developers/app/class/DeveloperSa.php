<?php
namespace App\Controllers;

class DeveloperSa {

    public function getEmpleados() {
        $data = file_get_contents("../app/data/employees.json");
        $employees = json_decode($data, true);
        return $employees;
    }
	
	public function listarEmpleados($criterio) {
		$data = file_get_contents("../app/data/employees.json");
        $employees = json_decode($data, true);

        $empleados = array();
        foreach ($employees as $pos => $employ) {
            $p = stripos($employ['email'], $criterio);
            if($p !== false || $criterio == "") {
                $empleados[$pos] = $employ;
            }
        }
        return $empleados;
	}
	
	public function getDetalleEmpleado($id) {
		$data = file_get_contents("../app/data/employees.json");
        $employees = json_decode($data, true);

        $empleados = array();
        foreach ($employees as $pos => $employ) {
            if($employ['id'] == $id) {
                $empleados[$pos] = $employ;
                break;
            }
        }
        return $empleados;
	}
}
?>
