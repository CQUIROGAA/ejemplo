<?php
namespace App\Controllers;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class PagesController extends Controller {

    public function home(Request $request, Response $response){
        $this->render($response , 'pages/home.twig');
    }

    public function getEmpleado(Request $request, Response $response){
        $developerSa = new DeveloperSa();
		$lista = $developerSa->getEmpleados();
		$_SESSION['listaEmpleados'] = $lista;
        $this->renderObject($response , 'pages/empleado.twig', array('empleados' => $lista));
    }

    public function postEmpleado(Request $request, Response $response){
		$developerSa = new DeveloperSa();
        $criterio = $request->getParam('name');
		$lista = $developerSa->listarEmpleados($criterio);
		$_SESSION['listaEmpleados'] = $lista;
        $this->renderObject($response , 'pages/empleado.twig', array('empleados' => $lista, 'texto' => $criterio));
		
    }
	
	public function getEmpleadoDetalle(Request $request, Response $response){
        $developerSa = new DeveloperSa();
		$criterio = $request->getParam('names');
		$id = $request->getParam('idEmpleado');
		$lista = $_SESSION['listaEmpleados'];
        $this->renderObject($response , 'pages/empleado.twig', array('empleados' => $lista, 'texto' => $criterio, 
			'detalle' => $developerSa->getDetalleEmpleado($id)));
    }

    public function getEjercicios(Request $request, Response $response) {
        $this->render($response , 'pages/ejercicios.twig');
    }

    public function postEjercicios(Request $request, Response $response) {
        $changeString = new ChangeString();
        $completeRange = new CompleteRange();
        $clearPar = new ClearPar();
        $change = $request->getParam('change');
        $changeRes = $changeString->build($change);
        $range = $request->getParam('range');
        $rangeRes = $completeRange->build($range);
        $clear = $request->getParam('clear');
        $clearRes = $clearPar->build($clear);
        $this->renderObject($response , 'pages/ejercicios.twig', array('changeString' => $change, 'changeStringRes' => $changeRes,
            'completeRange' => $range, 'completeRangeRes' => $rangeRes, 'clearPar' => $clear, 'clearParRes' => $clearRes));
    }
}
?>
