<?php
	SESSION_START();
	include "connection_code_to_data_base.php";
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Страница просмотра заявок</title>
		<style type="text/css">
	#Zap{left: 250px; top: 50px; width: 80%;
		background-color:#9ed0ff;
		position:absolute;
        color: #2568a7;
        padding: 15px;
		overflow:auto;
        margin: auto;
        border: 0.1em solid;
    }
	#Zap:target {display: block;}
	li{margin: 25px 0; width:100%; height:auto; text-align:center; color: black }
	li:hover{background-color:#2568a7 ;}
	input {border: 0px; }
	#sortir{
		list-style:none;
	}

	#nastr{
		left: 250px;
		top: 50px;
		width: 70%;
        border: 0.1em solid;
		background-color:#9ed0ff;
		position:absolute;
		height:350px;
		border:1px;
		padding: 10px;font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px;
		}

		#things{
			list-style-type: none;
			padding: 10px;
			font-family: Century Gothic, Helvetica, Arial, sans-serif;
			font-size: 18px;


		}
		#pass  { display: table;      }
#pass label { display: table-cell; }
#pass input { display: table-cell; margin-left: 2%;  margin-top: 2%; width: 150px; height: 30px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
  button{
	margin-left: 2%;  margin-top: 2%; width: 150px; height: 35px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
</style>
        <link rel="stylesheet" href=''>
	</head>
	<body>

<a href='console/index_admin.php'> В админскую консоль</a>

<div id="Zap" name="Zap" >
<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px;"  > Заявки на кредит </p>
<center>
<ul  id='sortir'>
	<?php
	$result=mysqli_query($DB, 'SELECT request.id_request, request.sum_credit, request.term_credit, request.procent, request.create_date, request.update_date, request.reason, bank.name, status.name as "n3", borrower.name, borrower.fname, borrower.otchname, dealer.name as "n1", employee.name as "n2" , employee.fname as "n4", employee.otchname as "n5"  FROM request, bank, borrower, status, dealer, employee WHERE dealer.id_dealer=employee.fk_dealer and request.fk_employee=employee.id_employee and request.fk_borrower=borrower.id_borrower and status.id_status=request.fk_status and bank.id_bank=request.fk_bank ORDER BY id_request;');
		foreach($result as $row){
			echo("<li class='talon' style='height: 300px; width: 70%;
			background: #fff; position:relative;
			display: inline-block; padding:35px; margin-bottom:10px; overflow:auto;  text-align: left;'>");
			echo("<form action='pdf.php' method='POST' id='pdf'> ");
			echo("<p style='text-align:center;'><b>Заявка №".$row['id_request']."</br> на взятие кредита </b></p><p style='text-align:center;'></p><p><b>Ф.И.О. заемщика: </b><u>".$row['fname']." ".$row['name']." ".$row['otchname']."</u></p><b>Дата создания заявки</b>: <u>".$row['create_date']."</u><input   type='text' name='date_time_zap' id='date_time_zap' hidden value='".$row["date_time_zap"]."'></p>");
			echo("<b>Кредит на сумму</b>: <u>".$row['sum_credit']." руб. 00 коп.</u> <b> на срок </b><u>".$row['term_credit']." мес.</u> <b> под </b><u>".$row['procent']."%</u></p>");
			echo("<p style='text-align:left;'> <b>Причина взятия кредита</b>: <u>".$row['reason']."</u><input type='date' name='date_talon' id='date_talon' hidden value='".$row["date_talon"]."'><span style='float:right;'> <b>Статус заявки</b>: <u>".$row['n3']."</u></span></p><p style='text-align:left;'><b>Диллер</b> <u>".$row['n1']."</u> <b>контактное лицо</b> <u>".$row['n2']." ".$row['n4']." ".$row['n5']."</u> </br>Последнее изменение ".$row["update_date"]."</p>");

			echo("</form>");
			echo("</li>");
		};
	?>
	</ul>
	</center>
</div>
	</body>
</html>