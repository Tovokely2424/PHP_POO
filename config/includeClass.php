<?php
function includeClass($className){
    if(file_exists($myfile = __DIR__.'/'.$className.'.php')){
        require $myfile;
    }
}
spl_autoload_register('includeClass');
?>