<?php

namespace Engine;

use Engine\DI\DI;

abstract class Model
{
    protected $di;


    public function __construct(DI $di)
    {
        $this->di      = $di;

    }


}



