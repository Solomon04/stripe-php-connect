<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/23/2018
 * Time: 12:00 PM
 *
 * @author Solomon
 */

/**
 * Function autoloads classes in libraries
 * @param $classname
 */
function autoload ($classname) {
    $base = $_SERVER['DOCUMENT_ROOT']."/stripe-connect/classes";
    $path = "";
    if (preg_match("/\\\\/",$classname)) {
        $path .= str_replace('\\',DIRECTORY_SEPARATOR, $classname);
    } else {
        $path .= str_replace('_',DIRECTORY_SEPARATOR, $classname);
    }
    include_once ($base."/".$path.".php");
}
spl_autoload_register("autoload");