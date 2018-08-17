<?php
require_once(dirname(__FILE__).'/includes/library.php');

date_default_timezone_set('Asia/Jakarta');

$curl = my_curl_get('https://indodax.com/api/btc_idr/ticker');

$response = $curl['response'];
if ('' != $response) {
	$response = json_decode($response, true);
	//echo '<pre>';var_dump($response);echo '</pre>';

	echo '<p>High : IDR '.number_format($response['ticker']['high'], 0, ',', '.').'</p>';
	echo '<p>Low : IDR '.number_format($response['ticker']['low'], 0, ',', '.').'</p>';
	echo '<p>Vol BTC : '.number_format($response['ticker']['vol_btc'], 8, ',', '.').'</p>';
	echo '<p>Vol IDR : IDR '.number_format($response['ticker']['vol_idr'], 0, ',', '.').'</p>';
	echo '<p>Last : IDR '.number_format($response['ticker']['last'], 0, ',', '.').'</p>';
	echo '<p>Buy : IDR '.number_format($response['ticker']['buy'], 0, ',', '.').'</p>';
	echo '<p>Sell : IDR '.number_format($response['ticker']['sell'], 0, ',', '.').'</p>';
	echo '<p>Server time : '.date('r', $response['ticker']['server_time']).'</p>';
}
?>
