<?php
class CORE_SECURITY{
//===>Private vars & functions


//===>Public functions

//===>Constructor
	public function __construct (){
	}

	public function load_dbconf (){
		$config=parse_ini_file('vdl-core/db.ini',true);
		define ("DBDIR",$config["DB"]["DBDIR"]);
		define ("DBUSR",$config["DB"]["DBUSR"]);
		define ("DBPSW",$config["DB"]["DBPSW"]);
		define ("DBASE",$config["DB"]["DBASE"]);
	}

	public function bd_connect (){
		$connection = mysql_connect(DBDIR, DBUSR , DBPSW) or die ("<p class='error'>Epic fail...no conecta al server.</p>");
		$database = DBASE;
		mysql_select_db($database, $connection) or die ("<p class='error'>ootro fail... no conecta a la base de datos.</p>");
		return $connection;
	}

	public function load_settings ($_connection){
		$query = "SELECT * FROM vdl_config ORDER BY config_id";
		$result = mysql_query($query,$_connection);
		while($row = mysql_fetch_assoc($result)){
			define ($row["config_name"],$row["config_value"]);
		}
	}
	
	public function encrypt($_string){
		//$result=
	
	return $result;
	}

	public function login($_USER,$_PASS){
		//Iniciamos sesion y conectamos a la base de datos
		session_start();
		//conectar a base de datos
		$config=parse_ini_file('db.ini',true);
		define ("DBDIR",$config["DB"]["DBDIR"]);
		define ("DBUSR",$config["DB"]["DBUSR"]);
		define ("DBPSW",$config["DB"]["DBPSW"]);
		define ("DBASE",$config["DB"]["DBASE"]);
		$connection= $this->bd_connect();
		//Extraemos el user y la pass
		$usr = mysql_real_escape_string($_USER);
		$pwd = mysql_real_escape_string(sha1(md5(trim($_PASS))));
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
			$_SESSION["mail"]=$array["email"];
			$_SESSION['loged'] = 1;
			header("Location:../index.php?pg=home");
		}
		else
			header("Location:../index.php?msg=loginf");
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
