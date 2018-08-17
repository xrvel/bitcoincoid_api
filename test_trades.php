<?php
require_once(dirname(__FILE__).'/includes/library.php');

date_default_timezone_set('Asia/Jakarta');

$curl = my_curl_get('https://indodax.com/api/btc_idr/trades');

$response = $curl['response'];
if ('' != $response) {
	$response = json_decode($response, true);
	//echo '<pre>';var_dump($response);echo '</pre>';

	foreach ($response as $data) {
		echo '<div style="padding:1em">';
		echo '<div>Date : '.date('r', $data['date']).'</div>';
		echo '<div>Price : IDR '.number_format($data['price'], 0, ',', '.').'</div>';
		echo '<div>Amount : '.number_format($data['amount'], 8, ',', '.').'</div>';
		echo '<div>Type : '.$data['type'].'</div>';
		echo '<div>Tid : '.$data['tid'].'</div>';
		echo '</div>';
	}
}
?>
