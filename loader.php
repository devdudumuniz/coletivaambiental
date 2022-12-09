<?php
function __autoload($className) {
    $classpath = array(
        'model/','helpers/','lib/','plugin/email/',//frontend
        '../model/','../helpers/','../plugin/email/'//backend
        );    
    $classFile = ucfirst($className) . ".php";
    $loaded = false;
    foreach ($classpath as $path) {
        if (is_readable("$path$classFile")) {
            require "$path$classFile";
            $loaded = true;
            break;
        }
    }
}
