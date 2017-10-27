<?php

namespace PhpBenchmarksZend\HelloWorld\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class HelloWorldController extends AbstractActionController
{
    public function helloWorldAction()
    {
        $this->response->getHeaders()->addHeaderLine('Content-Type: text/plain');

        return $this->response->setContent('Hello World !');
    }
}
