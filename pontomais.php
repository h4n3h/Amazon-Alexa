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

	if($f == "baterponto") {
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.pontomais.com.br/api/time_cards/register",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\"time_card\":{\"latitude\":-26.2661138,\"longitude\":-48.8413514,\"address\":\"Rua Barriga Verde, 324 - Bom Retiro, Joinville - SC, 89222-360, Brasil\",\"reference_id\":null,\"original_latitude\":-26.2661138,\"original_longitude\":-48.8413514,\"original_address\":\"Rua Barriga Verde, 324 - Bom Retiro, Joinville - SC, 89222-360, Brasil\",\"location_edited\":false},\"_path\":\"/meu_ponto/registro_de_ponto\",\"_device\":{\"manufacturer\":null,\"model\":null,\"uuid\":null,\"version\":null,\"browser\":{\"name\":\"Chrome\",\"version\":\"84.0.4147.125\",\"versionSearchString\":\"Chrome\"}},\"_appVersion\":\"0.10.32\"}",  //MUDAR ENDEREÇO
		  CURLOPT_HTTPHEADER => array(
		    "accept: application/json, text/plain, */*",
		    "access-token: ", //PREENCHER
		    "api-version: 2",
		    "client: ",  //PREENCHER
		    "expiry: 1628962500657",
		    "if-modified-since: Mon, 26 Jul 1997 05:00:00 GMT",
		    "origin: https://app.pontomaisweb.com.br",
		    "referer: https://app.pontomaisweb.com.br//",
		    "sec-fetch-dest: ",
		    "sec-fetch-mode: cors",
		    "sec-fetch-site: cross-site",
		    "token-type: Bearer",
		    "uid: ", //PREENCHER
		    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36",
		    "uuid: ", //PREENCHER
		    "Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$obj = json_decode($response);
		$status = $obj->success;

		if($status == "Ponto registrado com sucesso"){
			echo $status;
		}
		else{
			echo "Erro";
		}
	}
	//fim bater ponto
}

?>

</body>
</html>