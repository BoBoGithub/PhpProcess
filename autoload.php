<?php

//�Զ����ش�����
function loadClassLoader($className){
	$className = preg_replace('/Symfony\\\Component\\\Process\\\/', '', $className);
	
    include_once('./process/'.strtr($className, '\\', DIRECTORY_SEPARATOR).'.php');
}

//�����Զ�������
spl_autoload_register('loadClassLoader');

?>