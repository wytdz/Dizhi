<?php 
	//header('Content-Type: application/json');
	$domain = 'www.012345678.io';
	$res = shell_exec("nslookup -type=MX " . $domain);
	preg_match_all(
		'/mail exchanger = \d? (.*)/i',
		$res,
		$mXs,
		PREG_PATTERN_ORDER
	);
	$arr = [];
	if (count($mXs[1])) {
		foreach ($mXs[1] as $row){
			$arr[] = '【'.substr($row,0,-1).'】';
		}
	}
	echo '最新域名：'.implode('',$arr);
?>
