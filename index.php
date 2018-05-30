<?php
	$coordinates = '43.0846, -77.6743';
	
	$api_url = 'https://api.darksky.net/forecast/a7e26dce9a2d08b530822a9f9d459bce/'.$coordinates;
	
	$forecast = json_decode(file_get_contents($api_url));
	
    //Displays the data
	//echo '<pre>';
	//print_r($forecast);
	//echo '</pre>';
	
	//Current conditions
	$temp_curr = round($forecast->currently->temperature);
	$summary = $forecast->currently->summary;
	$icon = $forecast->currently->icon;
	
	//Get the appropriate icon	
	//matches the icons dark sky has with the icons from erik flowers
    function get_icon($icon) 
    {
        if($icon =='clear-day')
        {
            $the_icon = '<i class="wi wi-day-sunny display-2"></i>';
            return $the_icon;
        }
        else if($icon =='rain')
        {
            $the_icon = '<i class="wi wi-day-rain display-2"></i>';
            return $the_icon;
        }
        else if($icon =='snow')
        {
            $the_icon = '<i class="wi wi-day-snow display-2"></i>';
            return $the_icon;
        }
        else if($icon =='sleet')
        {
            $the_icon = '<i class="wi wi-day-sleet display-2"></i>';
            return $the_icon;
        }
        else if($icon =='wind')
        {
            $the_icon = '<i class="wi wi-day-windy display-2"></i>';
            return $the_icon;
        }
        else if($icon =='fog')
        {
            $the_icon = '<i class="wi wi-day-fog display-2"></i>';
            return $the_icon;
        }
        else if($icon =='cloudy')
        {
            $the_icon = '<i class="wi wi-day-cloudy display-2"></i>';
            return $the_icon;
        }
        else if($icon =='partly-cloudy-day')
        {
            $the_icon = '<i class="wi wi-day-cloudy display-2"></i>';
            return $the_icon;
        }
        else if($icon =='hail')
        {
            $the_icon = '<i class="wi wi-day-hail display-2"></i>';
            return $the_icon;
        }
        else if($icon =='thunderstorm')
        {
            $the_icon = '<i class="wi wi-day-thunderstorm display-2"></i>';
            return $the_icon;
        }
        else
        {
            $the_icon = '<i class="wi wi-day-thermometer"></i>';
            return the_icon;
        }
    }
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
        	<div class="card p-2" style="margin: 0 auto; max-width: 320px;">
             	<h1>Current Forecast</h1>

             	<!-- the current temperature -->
             	<p class="display-2"><?php echo $temp_curr; ?> &deg;</p>
             	<!-- the icon -->
             	<p class="display-4"><?php echo get_icon($icon); ?></p>
             	<!-- the description of weather -->
             	<h5 class="display-5"><?php echo $summary; ?></h5>
            </div>
        </main>
    </body>
</html>