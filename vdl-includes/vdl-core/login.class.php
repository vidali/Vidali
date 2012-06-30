<?php
class Session{
//Elementos privados: usuario (limpiando elementos "extraños") y contraseña cifrada en md5.
//Funciones para obtener las variables privadas,filtrando con la funcion mysql_real_string...
	private $_user;
	private $_password;
	private function get_user(){
		$res=mysql_real_escape_string($this->_user);
		return $res;
	}
	private function get_pass(){
		$res=mysql_real_escape_string($this->_password);
		return $res;		
	}
	
//Elementos Publicos: Constructor e inicio de sesion, en caso de datos erroneos redirecciona al home con codigo de error...
	public function __construct ($_id, $_pass){ 
		$this->_user = htmlspecialchars(trim($_id)); 
		$this->_password = sha1(md5(trim($_pass))); 
	}

	public function login(){
		//Iniciamos sesion y conectamos a la base de datos
		session_start();
		//conectar a base de datos
		include("../vdl-functions/core_security.class.php");
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		//Extraemos el user y la pass
		$usr = $this->get_user();
		$pwd = $this->get_pass();
		//Buscamos el usuario y seleccionamos la informacion basica de este...
		$query = sprintf("SELECT 
								vdl_users.nickname,
								vdl_users.name,
								vdl_users.email
								FROM vdl_users WHERE vdl_users.user_id='%s' && vdl_users.passwd = '%s'", $usr,$pwd);
		$result=mysql_query($query,$connection);
		/*DEPURACION
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}*/
		if(mysql_num_rows($result)){ // nos devuelve 1 si encontro el usuario y el password
			$array=mysql_fetch_array($result);
			//Agregamos los datos basicos a la sesion y redirigimos a la página principal
			$_SESSION["nickname"]=$array["nickname"];
			$_SESSION["nombre"]=$array["name"];
			$_SESSION["mail"]=$array["mail"];
			$_SESSION['loged'] = 1;
			header("Location:../index.php");
		}
		else
			header("Location:../index.php?msg=loginf");
	}
}

?>
