<?php 

namespace Engine\Service;

use Engine\DI\DI;

use Engine\Core\Router\Router;
use Engine\Core\Template\View;
use Engine\Load;
use Engine\Core\HTTP\Request;
use Engine\Core\Log\Log;


class Provider 
{
    private $di;



    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->createObject();

    }
    private function createObject()
    {
        $this->append('router',  new Router('https://oren.ru'));
        $this->append('view',    new View($this->di));
        $this->append('load',    new Load($this->di));
        $this->append('request', new Request());
        $this->append('log',     new Log());

        
    }

    private function append($keyDI, $objectDI)
    {
        $this->di->set($keyDI, $objectDI);
    }


}