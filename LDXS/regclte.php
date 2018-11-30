<?php
	$error = "";
	if(isset($_post['Registrar'])){
		$cdcl = $_post['cdcl'];
		$dsnome = $_post['Nome'];
		$idtipo =$_post['idtipo'];
		$cdvend =$_post['cdvend'];
		$dslim =$_post['dslim'];

		$verify = mysql_query("SELECT * from vendedores where cdcl = '$cdcl'");

		if(strlen($cdcl)<1)
		{
				$error = "<h2style='color:red'>Codigo não aceito</h2>";
		}
		else if(strlen($dsnome)<2)
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
		<h1>Manutenção de Clientes</h1>
		<div>
			<?php echo $error;?>
			<form method="Post">
			<table width="50%">
				<tr>
					<td style="float: right;width:50% ">Codigo do Cliente:</td>
					<td ><input type="name" name="cdcl"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Nome:</td>
					<td ><input type="name" name="dsnome"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">ID tipo:</td>
					<td ><input type="nome" name="idtipo"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Codigo do Vendedor:</td>
					<td ><input type="nome" name="cdvend"></td>
				</tr>
				<tr>
					<td style="float: right;width:50% ">Limite de Credito:</td>
					<td ><input type="decimal" name="dslim"></td>
				</tr>
				
				
			</table>
			<input type="submit" name="modificar" value="Registrar"style="width: 50%">
		</div>

	</center>
</body>
</html>