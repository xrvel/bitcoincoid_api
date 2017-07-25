<?php
require_once(dirname(__FILE__).'/includes/library.php');

$curl = my_curl_get('https://vip.bitcoin.co.id/api/btc_idr/depth');

$response = $curl['response'];
if ('' != $response) {
	$response = json_decode($response, true);
	//echo '<pre>';var_dump($response);echo '</pre>';

	echo '<h1>Buy</h1>';
	echo '<ol>';
	foreach ($response['buy'] as $data) {
		echo '<li>IDR '.number_format($data[0], 0, ',', '.').' : '.$data[1].'</li>';
	}
	echo '</ol>';

	echo '<h1>Sell</h1>';
	echo '<ol>';
	foreach ($response['sell'] as $data) {
		echo '<li>IDR '.number_format($data[0], 0, ',', '.').' : '.$data[1].'</li>';
	}
	echo '</ol>';
}
?>