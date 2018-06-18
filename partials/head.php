<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>Time Machine - <?php getTitle(); ?></title>

	<!-- Imports Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<!-- Imports Bootstrap stylesheets -->
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap/css/bootstrap.min.css">

	<!-- Imports custom stylesheet -->
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">

	<!-- Imports Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


	<script type="text/javascript">
		function date_time() {
    	var date = new Date();
    	var am_pm = "AM";
    	var hour = date.getHours();
    		if(hour>=12){
        		am_pm = "PM";
    		}
		    if(hour>12){
		        hour = hour - 12;
		    }
		    if(hour<10){
		        hour = "0"+hour;
		    }

		    var minute = date.getMinutes();
		    if (minute<10){
		        minute = "0"+minute;
		    }
		    var sec = date.getSeconds();
		    if(sec<10){
		        sec = "0"+sec;
		    }

    	document.getElementById("time").innerHTML =  hour+":"+minute+":"+sec+" "+am_pm;
		}
		setInterval(date_time,500);
	</script>