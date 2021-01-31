<?php 

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;


class Cms {

  private $di;
  private $router;

   public function __construct($di)
  {
    $this->di = $di;
    $this->router = $this->di->get('router');
    $namespaceRoute = ENV . DS . 'Route';
    $route  = new $namespaceRoute($this->router);
  }   
    
    //Выводит данные        
  public function run() 
  {
    try 
    {
      $this->router();
    }
    catch (\Exception $e) {

      echo $e->getMessage();
      exit;
    }
  }

  private function router()
  {
    // Доуступ к суперглобальной переменной, а именно доступ к методу передачи данных
    $routerDispatcher = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
    if ($routerDispatcher == null)
    {
      $routerDispatcher = new DispatchedRoute('ErrorController:page404');
    }
    list($class, $action) = explode(':', $routerDispatcher->getController(), 2);
    //explode из строки создат масив 
    $controller = '\\' . ENV . '\\Controller\\'.$class;
    $parameters = $routerDispatcher->getParameters();

    if ($class == 'ErrorController') {
      $action = 'page404';
    }

    call_user_func_array([new $controller($this->di), $action], $parameters);
  }

}





?>