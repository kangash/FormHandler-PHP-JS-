<?php

namespace Catalog;

class Route 
{

  public $router;

  public function __construct($routerObject)
  {
    $this->router = $routerObject;

    $this->loadRoutes();
  }

  public function loadRoutes()
  {
      //Добавление новых данных в роутер
    $this->router->add('home', '/', 'HomeController:index');
    $this->router->add('new-user', '/ajaxRegistrationUser/', 'AcсountController:ajaxRegistrationUser', 'POST');
  }


}
  
 

?>