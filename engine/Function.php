<?php

/**
 * Returns path to a Flexi CMS folder.
 *
 * @param  string $section
 * @return string
 */
function path($section)
{
    $pathMask = ROOT_DIR . DS . '%s';   
    // Return path to correct section.
    switch (strtolower($section))
    {
        case 'controller':
            return sprintf($pathMask, 'Controller');  
        case 'model':
            return sprintf($pathMask,  'Model');
        case 'view':
            return sprintf($pathMask,  'View');
        default:
            return ROOT_DIR;
    }
}

function path_catalog_view($section = '')
{
    $pathMask = $_SERVER['DOCUMENT_ROOT'] . DS . 'catalog\\View' . DS . '%s';

    switch (strtolower($section)) 
    {
        case 'theme':
            return sprintf($pathMask, 'theme');
        case 'uploads':
            return sprintf($pathMask, 'uploads');
        default:
            return $_SERVER['DOCUMENT_ROOT'] . DS . 'catalog';
    }
}



function declination($num)
{
    //пользователь
    $n = $num % 100;

    //ограничение до 20
    if ($n >=5 && $n <= 20) {
        $r = 2;
    }

    $n %= 10;

    if ( $n >=2 && $n <= 4) {
        $r = 1;
    }
    if ( $n === 1 ) {
        $r = 0;
    }

    $skl = ['ь', 'я', 'ей'];
    return sprintf('%s пользовател%s', $num, $skl[$r]);

}
