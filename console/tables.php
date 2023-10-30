<?php
if($_GET['tab'] == 'bank'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == 'request'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>';
};

if($_GET['tab'] == 'borrower'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == "dealer"){
session_start();
  $_SESSION["table"]=$_GET['tab'];
	echo('
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>');
	};

if($_GET['tab'] == 'employee'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == 'status'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://forwork/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

?>