<?php
require_once(dirname(__FILE__).'/includes/library.php');

$curl = my_curl_get('https://vip.bitcoin.co.id/api/btc_idr/ticker');

$response = $curl['response'];
if ('' != $response) {
	$response = json_decode($response, true);
	echo '<pre>';var_dump($response);echo '</pre>';
}
?>
