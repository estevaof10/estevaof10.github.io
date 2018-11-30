<?php
	$error = "";
	if(isset($_post['Registrar'])){
		$cdvend = $_post['cdvend'];
		$Nome = $_post['Nome'];
		$cdtab =$_post['cdtab'];
		$dtnasc =$_post['dtnasc'];

		$verify = mysql_query("SELECT * from vendedores where cdvend = '$cdvend'");

		if(strlen($cdvend)<1)
		{
				$error = "<h2style='color:red'>Codigo não aceito</h2>";
		}
		else if(strlen($nome)<2)
		{
				$error = "<h2style='color:red'>Nome muito pequeno</h2>";

		}
		else if(strlen($cdtab))
		{
				$error = "<h2style='color:red'>Codigo não aceito</h2>";
		}
		else if(strlen($dtnasc))
		{
				$error = "<h2style='color:red'>Data não aceita</h2>";
		}
		else if(mysql_num_rows($verify)>0)
		{
			$error ="<h2 style='color:red'>Codigo de vendedor ja alterado ou ja existe!</h2>";
		}
		else{
			mysql_query("INSERT vendedores(cdvend,dsnome,cdtab,dtnasc) VALUES (`$cdvend`,`$nome`,`$cdtab`,`$dtnasc`)");
			$error= "<h2 style='color:green'>CONCLUIDO</h2>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">>
	<title>Manutenção</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("header.php");?>
	<center>
		<h1>Manutenção de Vendedores</h1>
		<div>
			<?php echo $error;?>
			<form method="Post">
			<table width="50%">
				<tr>
					<td style="float: right;width:50% ">Codigo do Vendedor:</td>
					<td ><input type="name" name="cdvend"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Nome:</td>
					<td ><input type="name" name="dsnome"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Codigo da tabela de preço:</td>
					<td ><input type="inteiro" name="cdtab"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Data de Nascimento:</td>
					<td ><input type="data" name="dtnasc"></td>
				</tr>
				
			</table>
			<input type="submit" name="modificar" value="Registrar"style="width: 50%">
		</div>

	</center>
</body>
</html>