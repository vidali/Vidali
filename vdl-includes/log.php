<?php
$set = $_GET["func"];
//===>Check session
if ($set == "login"){
?>
	Iniciar secion en vidali:<br/>
	<form action="vdl-includes/session_start.php" method="post">
		<label>usuario:</label><br/><input id ="user" name="user" size="40" type="text" /><br/>
		<label>contraseña:</label><br/><input id ="passwd" name="passwd" size="40" type="password" /><br/>
		<center><input type="submit" value="Iniciar sesion"></center>
	</form>
<?php
}
else{
	session_start();
	session_unset();
	session_destroy();
	header("location: ../index.php");
}
?>
