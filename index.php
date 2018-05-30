<?php
	$coordinates = '43.0846, -77.6743';
	
	$api_url = 'https://api.darksky.net/forecast/a7e26dce9a2d08b530822a9f9d459bce/'.$coordinates;
	
	$forecast = json_decode(file_get_contents($api_url));
	
    //Displays the data
	echo '<pre>';
	print_r($forecast);
	echo '</pre>';
?>

<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>Forecast</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    	<link rel="stylesheet" href="css/weather-icons.min.css">	
    </head>
    <body>
        <main class="container text-center">
            <h1 class="display-1">Forecast</h1>
        </main>
    </body>
</html>