<?php
/* Created By BuffFreak */
require_once __DIR__."/config.php";
echo "Dibuat Oleh BuffFreak ".date("Y");
while(true){
	foreach($config as $data){
		for($i = 1; $i <= 181; $i++){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://jilovideo.com/jilo_api/api/add_coin.php");
			curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.8.0");
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("token: {$data['token']}", "session: {$data['session']}"));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data['data']);
			$result = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			list($header, $body) = explode("\r\n\r\n", $result);
			curl_close($ch);
			echo "SEEEP GAYN + 5 COINS EA\n";
		}
		echo "TASK ACCOUNT => ".substr($data['data'], 0, 10)."... => DONE!\n";
	}
	echo "ALL TASK COMPLETE! PLEASE WAIT 1 DAY TO REPEAT A PROCCESS!, REPEAT AUTOMATICALLY\n";
	sleep(86400); // SLEEP 1 DAY
}
?>