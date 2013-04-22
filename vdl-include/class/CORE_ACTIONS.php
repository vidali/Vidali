<?php

/**
 * class CORE_ACTIONS
 * 
 */
class CORE_ACTIONS extends CORE_MAIN{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/
    public function checkstyle($text){
        //Comprobamos las Negritas
		preg_match_all ("/\*([A-Za-z0-9-_\s]+)\*/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = '*'.$black.'*';
			$replace = '<b>'.$black.'</b>';
			$text = str_replace($find, $replace, $text);
		}

		//Comprobamos las cursivas
		preg_match_all ("/_([A-Za-z0-9-_\s]+)_/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = '_'.$black.'_';
			$replace = '<i>'.$black.'</i>';
			$text = str_replace($find, $replace, $text);
		}
		
		//Comprobamos los tachados
		preg_match_all ("/-([A-Za-z0-9-_\s]+)-/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = '-'.$black.'-';
			$replace = '<strike>'.$black.'</strike>';
			$text = str_replace($find, $replace, $text);
		}
        return $text;
    }

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function create_user($_email,$_nick,$_password,$_name,$_bday,$_sex,$_location,$_bio) {
	  $connection = parent::connect();
		$_passwd = mysql_real_escape_string(sha1(md5(trim($_password))));
		$query = ("INSERT INTO `vdl_user`(`email`,`nick`,`password`,`name`,`birthdate`,`sex`,`location`,`website`,`description`,
										  `avatar_id`,`n_views`,`n_contacts`,`n_groups`,`session_key`,`session_id`,
										  `privacy_level`,`mail_notify`,`color_theme`)
				   VALUES('$_email','$_nick','$_passwd','$_name','$_bday','$_sex','$_location',' ','$_bio',
						  'prof_def','0','0','0','0','0',
						  'low', UNHEX(  '0' ) ,'white')");
		$result = $connection->query($query);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message = $message . ' Whole query: ' . $query;
			die($message);
			return false;
		}
		else
			$id = mysqli_insert_id($connection);			
			$query = ("UPDATE `vdl_user` set `age` = (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5))");
			$result = $connection->query($query);
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message = $message . ' Whole query: ' . $query;
				die($message);
				return false;
			}
		return true;
  } // end of member function create_user

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function create_group( ) {
  } // end of member function create_group

  /**
   * 
   *
   * @return boolean
   * @access public
   */
  public function exist_user($email) {
		$connection = parent::connect();
		$email = htmlspecialchars($email);
		$query = sprintf("SELECT * FROM vdl_user WHERE vdl_user.email='%s'", $email);
		$result= $connection->query($query);
		$exist = $result->num_rows();
		if($exist == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
  } // end of member function exist_user

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function meta_text($text) {
		$text = html_entity_decode($text);
		//Comprobamos las Menciones 
		preg_match_all ("/[@]+([A-Za-z0-9-_]+)/",$text, $users); 
		foreach($users[1]  as $key => $user){ 
			$find = '@'.$user; 
			$replace = '<b><a href="'.BASEDIR.'/u/'.$user.'/" >@'.$user.'</a></b>'; 
			$text = str_replace($find, $replace, $text); 
		} 
		 
		//Comprobamos los Hashtag 
		$text = preg_replace('/[#]+([A-Za-z0-9-_]+)/',
        '<b><a href="'.BASEDIR.'/g/\1/">#\1</a></b>',
        $text);

		//Comprobamos las redes
		preg_match_all('/[!]+([A-Za-z0-9-_]+)/',$text, $ntag);
		foreach($ntag[1]  as $key => $net){
			//Aqui podemos hacer que lo agrege a la database
			$find = '!'.$net;
			$replace = '<b><a href="'.BASEDIR.'/g/'.$net.'"/>!'.$net.'</a></b>';
			$text = str_replace($find, $replace, $text);
		}

		//Comprobamos los t�tulos
		preg_match_all ("/>\*([A-Za-z0-9-_\s]+)\*</",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = '>*'.$black.'*<';
			$replace = '<u><h1>'.$black.'</h1></u>';
			$text = str_replace($find, $replace, $text);
		}
		
        $text = $this->checkstyle($text);

		//Comprobamos los links youtube
		preg_match_all ("/http:\/\/www\.youtube\.com\/watch\?v=([A-Za-z0-9-_]+)/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = 'http://www.youtube.com/watch?v='.$black;
			$replace = '<iframe width="250" height="225" src="http://www.youtube.com/embed/'.$black.'?wmode=transparent"  frameborder="0" allowfullscreen></iframe>';
			$text = str_replace($find, $replace, $text);
		}
		//http://img.youtube.com/vi/sEhy-RXkNo0/default.jpg para la vista previa de la imagen

		//Comprobamos los links youtube https
		preg_match_all ("/https:\/\/www\.youtube\.com\/watch\?v=([A-Za-z0-9-_]+)/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = 'https://www.youtube.com/watch?v='.$black;
			$replace = '<iframe width="250" height="225" src="http://www.youtube.com/embed/'.$black.'?wmode=transparent"  frameborder="0" allowfullscreen></iframe>';
			$text = str_replace($find, $replace, $text);
		}
		//http://img.youtube.com/vi/sEhy-RXkNo0/default.jpg para la vista previa de la imagen

		//Comprobamos los links vimeo numericos
		preg_match_all ("/http:\/\/vimeo\.com\/([A-Za-z0-9-_]+)/",$text, $blacks);
		foreach($blacks[1]  as $key => $black){
			$find = 'http://vimeo.com/'.$black;
			$replace = '<iframe width="250" height="225" src="http://player.vimeo.com/video/'.$black.'" frameborder="0" allowFullScreen></iframe>';
			$text = str_replace($find, $replace, $text);
		}

		return $text;
	} // end of member function meta_text

  /**
   * 
   *
   * @return boolean
   * @access public
   */
  public function is_friend($_user1,$_user2) {
		$connection = parent::connect();
		$rg = 6;
		$query = sprintf("SELECT status FROM  vdl_friend_of WHERE  user1 ='%s' AND  user2 ='%s'",$_user1,$_user2);
		$result=$connection->query($query);
		$rescount = $result->num_rows();
		if($rescount == 0){
			$query = sprintf("SELECT status FROM  vdl_friend_of WHERE  user1 ='%s' AND  user2 ='%s'",$_user2,$_user1);
			$result= $connection->query($query);
			$rescount = $result->num_rows();
			if($rescount == 0)
				$rg = 6;
			else{
				$ra = $result->fetch_assoc();
				$rg = $ra["status"];
			}
		}
		else{
			$ra = $result->fetch_assoc();
			$rg = $ra["status"];
		}
		return $rg;
  } // end of member function is_friend

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function search( ) {
  } // end of member function search

  /**
   * 
   *
   * @return void
   * @access public
   */
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
            session_start();
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
			//Agregamos los datos basicos a la sesion y redirigimos a la pagina principal
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
	}// end of member function login


static public function add_trend($text){
		preg_match_all('/[#]+([A-Za-z0-9-_]+)/',$text, $hash); 
		$hashtag = $hash[1]; 
		foreach($hashtag  as $key => $hash){ 
			$ht=ucwords(strtolower($hash));
			$connection = parent::connect();
			$query = ("SELECT topic FROM vdl_trending WHERE topic='$ht'");
			$result = $connection->query($query) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
			if(!$result)
				return false;
			if($result->num_rows == 0){
				$query = ("INSERT INTO vdl_trending (topic,count) VALUES ('$ht',1)");
				$result = $connection->query($query) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));			
				if(!$result)
					return false;
			}
			else{
				$query = ("UPDATE vdl_trending SET count =count+1 WHERE topic='$ht'");
				$result = $connection->query($query) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));					
				if(!$result)
					return false;
			}
		} 
		return true;
	}


} // end of CORE_ACTIONS
?>
