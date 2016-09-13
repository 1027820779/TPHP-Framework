<?php

function smarty_function_js($params, &$smarty)
{
    
    $path = $params['file'];
    return  "<script type='text/javascript' src='{$path}'></script>";
}

/* vim: set expandtab: */

?>
