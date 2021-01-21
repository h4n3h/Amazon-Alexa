<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>H4N3H - API</title>
</head>
<body>
<p id="resposta"></p>

<?php

if(isset($_GET["f"])){

$f = $_GET["f"];

	//Mudar header authorization - gerar no site https://developer.spotify.com/console/put-shuffle/
	//inicia spotify-shuffle
	if($f == "spotify-shuffle") {
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.spotify.com/v1/me/player/shuffle?state=true',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_HTTPHEADER => array(
		  	'Content-Length: 0',
		    'Accept: application/json',
		    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36',
		    'Authorization: Bearer TOKEN AQUI' //PREENCHER
		  ),
		));

		$response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		echo $status;

		if($status == "204" || $status == "200"){
			echo $status." Spotify Shuffle ON";
		}
		else{
			echo "Erro";
		}
	}
	//fim spotify shuffle
}

?>

</body>
</html>
