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
	
	public function login($_USER,$_PASS,$_REM){
		//Iniciamos sesion y conectamos a la base de datos
		$connection = parent::connect();
		//Extraemos el user y la pass
		$usr = $_USER;
		if($_REM == 2){
			$pwd = $_PASS;
		}
		else
			$pwd = mysqli_real_escape_string($connection,sha1(md5(trim($_PASS))));
		$query = sprintf("SELECT *
						  FROM vdl_user 
						  WHERE vdl_user.email='%s' && vdl_user.password = '%s'", $usr,$pwd);
						  //LO DEJAMOS AQUI
		$result= $connection->query($query);
		//DEPURACION
		 if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
			return false;
		}
		if($result->num_rows){
			// nos devuelve 1 si encontro el usuario y el password
			$array= $result->fetch_array();
			//generamos id de la sesion
			$s_id = session_id();
			$query = sprintf("UPDATE  vdl_user SET  `session_id` =  '%s' WHERE  `vdl_user`.`id` =%s;",$s_id,$array["id"]);
			$result= $connection->query($query);
			 if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
				return false;
			}
			//Agregamos los datos basicos a la sesion y redirigimos a la p�gina principal
			$_SESSION["id"]=$array["id"];
			$_SESSION["nick"]=$array["nick"];
			$_SESSION["name"]=$array["name"];
			$_SESSION["mail"]=$array["email"];
			$_SESSION['loged'] = true;
			if ($_REM == 1){
				setcookie ('nick_c', $usr, time() + (86400 *  365),'/');
				setcookie ('pass_c', $pwd, time() + (86400 *  365),'/');
			}
			return true;
		}
		else{
			return false;
		}
	}

	public function clear_text_strict($source){
		$db_words=array("UNION","DELETE","DROP","SELECT","INSERT","UPDATE","CREATE","TRUNCATE","ALTER","INTO","DISTINCT","GROUP BY",
							 "WHERE","RENAME","DEFINE","UNDEFINE","PROMPT","AND","+","OR","ACCEPT","VIEW","COUNT","HAVING");
		$url_words=array('//','www','http:','.com',"MIME-Version:","Content-Transfer-Encoding:","Return-path:","Subject:","From:",
							 "Envelope-to:","To:","bcc:","cc:");
		$script_words=array("onload(","alert(",");","&lt;script&gt;","&lt;/script&gt;","&quot;","&#39;");
		$aux=htmlentities($source,ENT_QUOTES);
		$aux=str_ireplace($db_words,"",$aux);
		$aux=str_ireplace($url_words,"",$aux);
		$aux=str_ireplace($script_words,"",$aux);
				return $aux;
	}

	public function clear_text($source){
		$url_words=array("MIME-Version:","Content-Transfer-Encoding:","Return-path:","Subject:","From:",
								 "Envelope-to:","To:","bcc:","cc:");
		$script_words=array("onload(","alert(",");","&lt;script&gt;","&lt;/script&gt;","&quot;","&#39;");
		$banned_sites=array("www.4chan.org");
		$aux=htmlentities($source,ENT_QUOTES);
		$aux=str_ireplace($url_words,"",$aux);
		$aux=str_ireplace($script_words,"",$aux);
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
			$_GET [ $variable ] = str_replace ( "'" , '' , $_GET [ $variable ]);
		}
		foreach( $_POST as $variable => $valor ){
			$_POST [ $variable ] = str_replace ( "'" , '' , $_POST [ $variable ]);
		}
	}
}
?>
