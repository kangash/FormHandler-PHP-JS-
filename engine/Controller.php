<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected $di;

    protected $view;

    protected $request;

    protected $load;

    protected $log;

    public function __construct(DI $di)
    {
        $this->di      = $di;

        $this->view    = $this->di->get('view');
        $this->request = $this->di->get('request');
        $this->load    = $this->di->get('load');
        $this->log     = $this->di->get('log');
        
        $this->initVars();
    }

    public function __get($key)
    {
        return $this->di->get($key);
    }

    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
               // print_r($this->{$var});
            }
        }
        return $this;

    }


}
















?>