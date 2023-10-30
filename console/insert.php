<?php
session_start();
include "../connection_code_to_data_base.php";
		$table=$_SESSION['table'];

		$SQL_INSERT='INSERT INTO `'.$table.'` (`';
		$data_for_sql ='select * from '.$table;

		$names_res=mysqli_query($DB, 'SHOW COLUMNS FROM '.$table);
				if(!$names_res){
					echo 'CAL';
					mysqli_error();
					exit;
				}
				if(mysqli_num_rows($names_res)>0){
						while($row = mysqli_fetch_array($names_res)[0])
								{
									$SQL_INSERT=$SQL_INSERT.$row."`, `";}
				}

		$SQL_INSERT = substr($SQL_INSERT,0,-3);
		$SQL_INSERT =$SQL_INSERT.") VALUES (NULL, ";

		$arrayName = array($_POST['new']);

		foreach ($arrayName[0] as $massiv) {
			if($massiv=='NULL'){
			$SQL_INSERT=$SQL_INSERT.$massiv.", ";} else {
			$SQL_INSERT=$SQL_INSERT."'".$massiv."', ";};
		};

		$SQL_INSERT = substr($SQL_INSERT,0,-2);

		$SQL_INSERT =$SQL_INSERT.");";

		$insert=mysqli_query($DB, $SQL_INSERT);

		echo ($SQL_INSERT);
	if ($insert==false){
				exit("<Meta http-equiv='refresh' content='0; URL=http://forwork/console/index_admin.php#table_cabinet'>");
		} else	{
				exit("<Meta http-equiv='refresh' content='0; URL=http://forwork/console/index_admin.php#table_cabinet'>");
};
?>