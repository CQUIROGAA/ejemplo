<?php
namespace App\Controllers;

use \Psr\Http\Message\ResponseInterface as Response;

class Controller {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function render(Response $response, $file) {
        $this->container->view->render($response , $file);
    }

    public function renderObject(Response $response, $file, $object) {
        $this->container->view->render($response , $file, $object);
    }
}
?>
