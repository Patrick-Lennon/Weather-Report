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
	$temp_high = round($forecast->daily->data[0]->temperatureHigh) + 2;
	$temp_low = round($forecast->daily->data[0]->temperatureLow) - 2;
    $precip_chance = $forecast->daily->data[0]->precipProbability * 100;
    $precipType = $forecast->daily->data[0]->precipType;
	
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
    
    //Function to display the proper type of precipitation
    function getPrecipType($precipType)
    {
        if($precipType == 'rain'){
            $display = 'Rain';
            return $display;
        }
        else if($precipType == 'sleet'){
            $display = 'Sleet';
            return $display;
        }
        else if($precipType == 'snow'){
            $display = 'Snow';
            return $display;
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
				
				<li class="list-group-item d-flex justify-content-between" style="border: none">
             	<!-- the current temperature -->
             	<p class="lead m-0">
             	<p class="display-2"><?php echo $temp_curr;?>&deg;</p> </p>
             	<p class="lead m-0">
             	<!-- the icon -->
             	<p class="display-5"><?php echo get_icon($icon); ?></p> </p>
             	
             	</li>
             	<!-- the description of weather -->
             	<h4 class="display-5"><?php echo $summary; ?></h5>
             	
             	<!-- hi, low, and precipitation chance -->
             	<li class="list-group-item d-flex justify-content-between" style="border: none">
                    <p class="lead m-0">
                        <span style="text-decoration: underline">Hi</span> <br> <?php echo $temp_high; ?>&deg;
                    </p>
                    <p class="lead m-0">
                        <span style="text-decoration: underline">Low</span> <br> <?php echo $temp_low; ?>&deg;
                    </p>			
                    <p class="lead m-0">
                        <span style="text-decoration: underline"><?php echo getPrecipType($precipType) ; ?></span> <br> <?php echo $precip_chance; ?>%
                    </p>
                </li>
            </div>
        </main>
    </body>
</html>