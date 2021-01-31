<?php

namespace Engine;

use Engine\DI\DI;

use \stdClass;

class Load 
{
    const MASK_MODEL_ENTITY     = '\%s\Model\%s\%s';
    const MASK_MODEL = '\%s\Model\%s';

    public $di;

    public function __construct(DI $di)
    {
        $this->di = $di;
    }


    public function model($modelName, $modelDir = false, $env = false)
    {
        $modelName  = ucfirst($modelName);
        $env        = $env ? $env : ENV;

        $namespaceModel = sprintf(
            self::MASK_MODEL,
            $env, $modelName
        );

        $isClassModel = class_exists($namespaceModel);
        if ($isClassModel) {
            // Set to DI
            $modelRegistry = new stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceModel($this->di);
            return $modelRegistry;
        }
        return $isClassModel;
    }



}