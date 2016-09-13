<?php

function smarty_function_css($params, &$smarty)
{
   $path = $params['file'];
   return '<link rel="stylesheet" type="text/css" href="'.$path.'"/>';
}

/* vim: set expandtab: */

?>
