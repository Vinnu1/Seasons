<?php
if(isset($_POST['a'])&&isset($_POST['b'])){
	$x=$_POST['a'];
	$y=$_POST['b'];
	$w="http://api.openweathermap.org/data/2.5/weather?lat=".$x."&lon=".$y."&apikey=YOUR_API_KEY";
	$raw=file_get_contents($w);
	$det=json_decode($raw,true);
	$weather=$det['weather'][0]['main'];
	$des=$det['weather'][0]['description'];
	$temp=$det['main']['temp'] - 273.15;
	$temp_max=$det['main']['temp_max'] - 273.15;
	$temp_min=$det['main']['temp_min'] - 273.15;
	$wind_sp=$det['wind']['speed'];
	$wind_dg=$det['wind']['deg'];
	$country=$det['sys']['country'];
	$sunrise=date('H:i:s',$det['sys']['sunrise']);
	$sunset=date('H:i:s',$det['sys']['sunset']);
	$hum=$det['main']['humidity'];
	echo "
	<table align='center'>
	<tr>
	<td>Weather (Main)</td><td>".$weather."</td>
	</tr>
	<tr>
	<td>Weather (Description)</td><td>".$des."</td>
	</tr>
	<tr>
	<td>Temperature</td><td>".$temp." C</td>
	</tr>
	<tr>
	<td>Temp (Max)</td><td>".$temp_max." C</td>
	</tr>
	<tr>
	<td>Temp (Min)</td><td>".$temp_min." C</td>
	</tr>
	<tr>
	<td>Humidity</td><td>".$hum." %</td>
	</tr>
	<tr>
	<td>Wind Speed</td><td>".$wind_sp." m/s</td>
	</tr>
	<tr>
	<td>Wind Degree</td><td>".$wind_dg."</td>
	</tr>
	<tr>
	<td>Sunrise (UTC)</td><td>".$sunrise."</td>
	</tr>
	<tr>
	<td>Sunset (UTC)</td><td>".$sunset."</td>
	</tr>
	<tr>
	<td>Country</td><td>".$country."</td>
	</tr>
	</table> ";
}
?>