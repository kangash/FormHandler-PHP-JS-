<?php

namespace Catalog\Controller;

use Engine\Controller;

class ErrorController extends Controller
{

     // Execute and route: not found
    public function page404()
    {
        echo 'Error: router not found';
        echo '<br> page 404';

    }



}