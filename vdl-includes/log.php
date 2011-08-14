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
	$_SESSION = array();
	if (ini_get("session.use_cookies")) 
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
	session_destroy();
	header("location: ../index.php");
}
?>
