<?php

//自动加载处理方法
function loadClassLoader($className){
	$className = preg_replace('/Symfony\\\Component\\\Process\\\/', '', $className);
	
    include_once('./process/'.strtr($className, '\\', DIRECTORY_SEPARATOR).'.php');
}

//设置自动加载类
spl_autoload_register('loadClassLoader');

?>