<?php
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CLIENT-ID, X-CLIENT-SECRET');
header('Access-Control-Allow-Credentials: true');
?>

<!DOCTYPE html>
<html>
<head>
<title>Progetto java</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div id="top"><img src="img/webLogo.png" id="timg"></div>
<div id="middle"> <?php include("include_index.php"); ?> </div><br><br><br><br>
<div id="bottom"><div id="img">Copyright &#169; 2018 - DEVELOPER CARMINE MORABITO</div></div>
</body>
</html>
