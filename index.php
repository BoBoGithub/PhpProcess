<?php
//自动加载
require_once 'autoload.php';

//引入操作类
use Symfony\Component\Process\PhpProcess;

//脚本文件
$script = <<<'EOT'
<?php
	$date = date('Y-m-d H:i:s');
	var_dump(PHP_VERSION, $date);
?>
EOT;

try {
	//实例化并运行脚本
	$process = new PhpProcess($script);
	$process->mustRun();

	//输出结果
	$output			= preg_split('{\r?\n}', trim($process->getOutput()));
	print_R($output);

	//错误信息
	$errorOutput	= trim($process->getErrorOutput());
	print_R($errorOutput);

} catch (\Exception $e) {
	echo 'Exception:'.$e->getMessage();
}

/**************************************************************************

运行结果如下：

bobo@migang:test$ /usr/local/php7/bin/php index.php 
Array
(
    [0] => string(6) "7.0.12"
    [1] => string(19) "2017-06-12 06:41:54"
)

***************************************************************************/

?>
