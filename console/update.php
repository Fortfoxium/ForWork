<?php
session_start();
		/*Коннект к БД*/
		include "../connection_code_to_data_base.php";
		/*Определение таблицы*/
		$table=$_SESSION['table'];

		/*Начало создание SQL запроса*/
		$SQL_INSERT='UPDATE '.$table.' SET ';




		/*Получение массива с чек боксами*/
		$arraycheckbox = $_POST['checkbox'];


		/*кол-во записей с галочкой*/
		$num_of_checks=count($arraycheckbox);

		$arr=[];
		reset($arraycheckbox);
			for ($i=0; $i<=$num_of_checks-1; $i++)
				{
						$arr[$i]=key($arraycheckbox);
						next($arraycheckbox);
				};


		/*Ищем названия полей по таблице*/
		$names_res=mysqli_query($DB, 'SHOW COLUMNS FROM '.$table);
				if(!$names_res){
					echo 'CAL';
					mysqli_error();
					exit;
				} else {
					/*кол-во полей в таблице*/
					$num_of_columns=mysqli_num_rows($names_res);

							if(mysqli_num_rows($names_res)>0){
								while($row = mysqli_fetch_array($names_res)[0]){
									$massiv_s_naim[]=$row;
									$massiv_v_massive[] = ($_POST[$row]);
							};
						};
								/*Сделал, заеб*а*/
						/*Но вот что теперь, надо сделать так, делаешь 4 заготовки с update  а потом добавляешь туда данные и названия полей, а в конце закроешь where id...=...*/
		$sql_strings = array();
		$sql_strings = array_fill(0,$num_of_checks,$SQL_INSERT);
		

		$strings="";
print_r($massiv_v_massive);
print_r($sql_strings);
			for($b=0; $b<=count($arr); $b++){
				for($i=1; $i<=count($massiv_s_naim)-1; $i++){
						if($massiv_v_massive[$i][$arr[$b]]=='NULL')
					{
						$sql_strings[$b]=$sql_strings[$b]." ".$massiv_s_naim[$i]." = ".$massiv_v_massive[$i][$arr[$b]].","; 
					}
						else
					{
						$sql_strings[$b]=$sql_strings[$b]." ".$massiv_s_naim[$i]." = '".$massiv_v_massive[$i][$arr[$b]]."',";
					}

					if($i==count($massiv_s_naim)-1){
							$sql_strings[$b] = substr($sql_strings[$b],0,-1);
							$sql_strings[$b]=$sql_strings[$b]." WHERE ".$massiv_s_naim[0]." = ".$arr[$b];
						}
				};
			};

				$c=0;
				foreach ($arr as $broh)
					{
						if ($DB->query($sql_strings[$c]));{
						$c++;
						echo "</br>".$sql_strings[$c];
					}
					};
				exit("<Meta http-equiv='refresh' content='0; URL=http://forwork/console/index_admin.php#table_cabinet'>");
				};
?>