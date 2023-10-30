 <?php
session_start();
echo($table);
include "../connection_code_to_data_base.php";
		$table=$_SESSION['table'];
		$arraycheckbox = $_POST['checkbox'];
		$SQL_INSERT='DELETE FROM '.$table.' WHERE ';
		$names_res=mysqli_query($DB, 'SHOW COLUMNS FROM '.$table.'');
				if(!$names_res){
					echo 'CAL';
					exit;
				};
				if(mysqli_num_rows($names_res)>0){
						$row = mysqli_fetch_array($names_res)[0];
									$SQL_INSERT=$SQL_INSERT.' '.$row." = ";
									};
		$num_of_checks=count($arraycheckbox);
		$strings = array();

		$strings = array_fill(0,$num_of_checks,$SQL_INSERT);

		$arr=[];

		reset($arraycheckbox);

			for ($i=0; $i<=$num_of_checks-1; $i++)
				{
						$arr[$i]=key($arraycheckbox);
						next($arraycheckbox);
				};
		print_r($arr);
				$c=0;
				foreach ($arr as $broh)
					{
						$strings[$c]=$strings[$c].$broh;
						if ($DB->query($strings[$c]));{}
						$c++;
					};

				exit("<Meta http-equiv='refresh' content='0; URL=http://forwork/console/index_admin.php#table_cabinet'>");
?>