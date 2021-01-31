<?php 

namespace Catalog\Controller;

use Engine\Controller;


class HomeController extends Controller
{


    public function index()
    {
        $this->view->render('index');
        // print_r($this->di);
    }



}