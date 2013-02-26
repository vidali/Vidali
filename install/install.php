<?php 
/*	Vidali, Social Network Open Source.
This file is part of Vidali.

Vidali is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vidali is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.*/

//Comprobar la integridad de los datos
$error= false;
$aux = 0;
$empty = "";
foreach ($_POST as $id => $data){
	if(empty($_POST[$id])){
		$aux++;
		$empty = $empty . "&emp$aux=$id";
		$error = true;
	}
}
	if($error == true){
		//header('Location:' . getenv('HTTP_REFERER') . "?empty=$aux"."$empty");
		//TODO: Si no es un lio, devolver esto en JSON
		echo $empty;
	}else{
		//crear el db.ini
		$con = new mysqli($_POST["DB_DIR"], $_POST["DB_USER"], $_POST["DB_PASS"],$_POST["DB_NAME"]);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		else{
			include "../vdl-include/vdl-core/core_db.class.php";
			define ("DBDIR","NULL");
			$core= new CORE_DB();
			$config = $core->set($_POST["DB_DIR"], $_POST["DB_USER"], $_POST["DB_PASS"],$_POST["DB_NAME"]);
			$nombre_archivo = 'vidali.sql';
			$sql = explode(";",file_get_contents($nombre_archivo)); 
			$con->autocommit(FALSE);
			foreach($sql as $query){
//				echo " Linea de la BD: $query<br>";
				if (!empty($query)){
					if(!$con->query($query))
						printf("Error: %s<br>", mysqli_error($con));
				}
			}
			$con->autocommit(TRUE);
		}
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (4, 'ADMIN', '1')"))
			printf("Error: %s<br>", mysqli_error($con));
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (5, 'REGISTER', '".$_POST["optionsRadios"]."')"))
			printf("Error: %s<br>", mysqli_error($con));
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (6, 'PRIVACY', '".$_POST["optionsRadios2"]."')"))
			printf("Error: %s<br>", mysqli_error($con));
		 /* TODO: Si index_bots o central_sync no estan marcados, no se envia el valor "yes" por POST  y por lo tanto deja $_POST["index_bots"] sin definir. Codigo comentado hasta que se solucione el bug para que el resto funcione.
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (7, 'INDEX', '".$_POST["index_bots"]."')"))
			printf("Error: %s<br>", mysqli_error($con));
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (8, 'SYNC', '".$_POST["central_sync"]."')"))
			printf("Error: %s<br>", mysqli_error($con));
		*/
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (9, 'STORAGE', 'SERVER')"))
			printf("Error: %s<br>", mysqli_error($con));
		if(!$con->query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (10, 'BASEDIR', '/Vidali')"))
			printf("Error: %s<br>", mysqli_error($con));
		//Crear usuario
/*		$admin = $_POST["nickname"];
		$password = mysql_real_escape_string(sha1(md5(trim($_POST["password"]))));
		date_default_timezone_set("Europe/London");
		$date = date($_POST["birthdate"]);
		$query = ("INSERT INTO vdl_users (user_id,passwd,nickname,name,location,genre,bday,email,bio,img_prof,prof_nets) VALUES
							 ('$admin','$password','".$_POST["nickname"]."','".$_POST["name"]."','".$_POST["location"]."','".$_POST["sex"]."','$date','".$_POST["email"]."','".$_POST["bio"]."','prof_def',1)");
		$result = mysql_query($query,$connection);
		
		$result = mysql_query("INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES (4, 'ADMIN', '$admin')",$connection);
		*/
		//header("Location:../index.php?action=register");
		echo "1";
	}
	mysqli_close($con);
?>
