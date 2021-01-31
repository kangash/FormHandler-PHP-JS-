<?php
namespace Engine\Core\Template;

class View
{
    protected $di;
    protected $theme;

    
    public function __construct($di)
    {
        $this->di = $di;
        $this->theme = new Theme();
    }

    public function render($template, $vars = [])
    {
        $func = path_catalog_view('theme') . '\Function.php';
        if (is_file($func)) {
            require $func;
        }

        $templatePath = path_catalog_view('theme') . '/' . $template . '.php';
        if(!is_file($templatePath))
        {
            throw new \InvalidArgumentException (
                sprintf('Tempate "%s"not found %s', $template, $templatePath)
            );
        }
        
        $this->theme->setData($vars);
        extract($vars); //из всех ключей масива создаст переменные 

        ob_start(); // используется при rendere
        ob_implicit_flush(0); // отключает неявную отчистку

        try{
            require $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }


}