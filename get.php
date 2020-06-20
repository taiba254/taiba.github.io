<!DOCTYPE html>
<html>
<head> <title>weather Report of <?php echo $_GET['q'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
      <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 </head>	  
<style>
html,body,h1,h2,h3,h4,h5,h6 {
	
	font-family: "Comic Sans Ms", cursive, sans-serif;
}
</style>

<body>
   


<?php
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
$string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=95deab77a4491e05d471f0b1ad8a48ec";
$data = json_decode(file_get_contents($string),true);
$temp = $data['main']['temp'];
$icon = $data['weather'][0]['icon'];
$visibility = $data['visibility'];
$visibilitykm = $visibility / 1000;
$country = "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].",".$data['sys']['coutry']."</h1></b>";
//$logo = "<img src='https://weatherwidget.io/js/widget.min.js".$icon.".png'>";
//$logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
$logo = "<img src='http://openweathermap.org/img/wn/10d@2x.png".$icon.".png'/>";


$desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
$time = "<b>Time:".$date('l g:i a', $data['sys']['time'])."</b><br>";
$day = "<b>Day:".$date('js F, Y', $data['sys']['day'])."</b><br>";
$temperature = "<b>Temp:".$temp."°C</b><br>";
$cloud = "<b>Clouds:".$data['clouds']['all']."%</b><br>";
$humidity = "<b>Humidity:".$data['main']['humidity']."%</b><br>";
$windspeed = "<b>Wind Speed:".$data['wind']['speed']."m/s</b><br>";
$pressure = "<b>Pressure:".$data['main']['pressure']."hpa</b><br>";
$visibility = "<b>Visibility:".$visibilitykm."km</b><br>";
$sunrise = "<b>Sunrise:".$date('h:i A', $data['sys']['sunrise'])."</b><br>";
$sunset = "<b>Sunset:".$date('h:i A', $data['sys']['sunset'])."</b>";

?>
<div class="w3-display-container w3-wide">
      <img sr="http://www.designbolts.com/wp-content/uploads/2014/03/blue-blur-background1.jpg" style="width:100%;height:100%">
	   <div class="w3-display-topmiddle w3-margin-top">
	 
	       <?php
	       echo $country;
	       echo $logo;
	       echo "<center><h2>".$desc."</h1></center>";
	       ?>
	 </div>
 <div class="w3-display-middle w3-margin-top w3-padding-top">
   <div class="w3-animate-left w3-margin-top"><br><br<br>
<h1 class="w3-xlarge">
     <?php echo $time; ?>
     <?php echo $day; ?>
     <?php echo $temperature; ?>
	 <?php echo $clouds; ?>
	 <?php echo $humidity; ?>
	 <?php echo $$windspeed; ?>
	 <?php echo $pressure; ?>
	 <?php echo $$visibility; ?>
	 <?php echo $sunrise; ?>
	 <?php echo $sunset; ?>
	 </h2>
   </div>
 </div>
</div>	 
</body>
</html>
