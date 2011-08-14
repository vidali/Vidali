<?php
class CORE_SECURITY extends CORE_MAIN{
	/*Private*/
	private $session_key; /*Contains the session_id() of the user. Empty if user is not logged.*/
	
	/*Public*/
	public function __construct (){
		parent::__construct();
		$this->session_key = session_id();
		
	}

	public function __destruct(){
		parent::__destruct();
	}

	public function encrypt($_string){
		//$result=

		return $result;
	}

	public function get_key(){
		return $this->session_key;
	}
	
	public function login($_USER,$_PASS){
		//Iniciamos sesion y conectamos a la base de datos
		session_start();
		$connection = parent::connect();
		//Extraemos el user y la pass
		$usr = mysql_real_escape_string($_USER);
		$pwd = mysql_real_escape_string(sha1(md5(trim($_PASS))));
		$query = sprintf("SELECT
							vdl_users.id,
							vdl_users.user_id,
							vdl_users.nickname,
							vdl_users.name,
							vdl_users.email
							FROM vdl_users WHERE vdl_users.user_id='%s' && vdl_users.passwd = '%s'", $usr,$pwd);
		$result=mysql_query($query,$connection);
		//DEPURACION
		 if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		if(mysql_num_rows($result)){
			// nos devuelve 1 si encontro el usuario y el password
			$array=mysql_fetch_array($result);
			//generamos id de la sesion
			$s_id = session_id();
			$query = sprintf("UPDATE  `vidali`.`vdl_users` SET  `session_id` =  '%s' WHERE  `vdl_users`.`id` =%s;",$s_id,$array["id"]);
			$result=mysql_query($query,$connection);
			//Agregamos los datos basicos a la sesion y redirigimos a la p�gina principal
			$_SESSION["id"]=$array["id"];
			$_SESSION["user_id"]=$array["user_id"];
			$_SESSION["nickname"]=$array["nickname"];
			$_SESSION["nombre"]=$array["name"];
			$_SESSION["mail"]=$array["email"];
			$_SESSION['loged'] = 1;
			return true;
		}
		else
			return false;
	}

	public function clear_text($source){
		$db_words=array("UNION","DELETE","DROP","SELECT","INSERT","UPDATE","CREATE","TRUNCATE","ALTER","INTO","DISTINCT","GROUP BY",
							 "WHERE","RENAME","DEFINE","UNDEFINE","PROMPT","AND","+","OR","ACCEPT","VIEW","COUNT","HAVING");
		$url_words=array('//','www','http:','.com',"MIME-Version:","Content-Transfer-Encoding:","Return-path:","Subject:","From:",
							 "Envelope-to:","To:","bcc:","cc:");
		$script_words=array("<>","SCRIPT","AND","ALERT");
		$banned_words=array("polla","marica","mierda","puta","mamon");
		$aux=htmlentities($source,ENT_QUOTES);
		$aux=str_ireplace($banned_words,"...",$aux);
		$aux=str_ireplace($db_words,"...",$aux);
		return $aux;
	}

	public function email_val($source){
		if (preg_match
		('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $source)){
			$datos = 1;
		}
		else
		$datos= 0;
		return $datos;
	}

	function clear_url_nav(){
		foreach( $_GET as $variable => $valor ){
			$_GET [ $variable ] = str_replace ( "'" , '\'' , $_GET [ $variable ]);
		}
		foreach( $_POST as $variable => $valor ){
			$_POST [ $variable ] = str_replace ( "'" , '\'' , $_POST [ $variable ]);
		}
	}
}
?>