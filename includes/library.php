<?php
function my_curl_get($url) {
	$ssl = false;
	if (preg_match('/^https/i', $url))
	{
		$ssl = true;
	}
	$ch = curl_init();
	if ($ssl)
	{
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	$res = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	unset($ch);
	return array(
		'response' => trim($res),
		'info' => $info
	);
}

function my_curl_post($url, $post_data) {
	$ssl = false;
	if (preg_match('/^https/i', $url))
	{
		$ssl = true;
	}
	$ch = curl_init();
	if ($ssl)
	{
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$res = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	unset($ch);
	return array(
		'response' => trim($res),
		'info' => $info
	);
}
?>
