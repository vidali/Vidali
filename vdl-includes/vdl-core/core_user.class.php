<?php
class CORE_USER{
//===>Private vars & functions
	private $_user_nickname;
	private $_user_email;
	private $_user_name;
	private $_user_location;
	private $_user_sex;
	private $_user_bday;
	private $_user_site;
	private $_user_bio;


//===>Public functions

//===>Constructor
	public function __construct (){ 
//		$this->_client = htmlspecialchars(trim($_ref));
	}

//===>Modify user data

	public function set_profile(){
	
	}

	public function add_network(){
	
	}

	public function add_friend(){
	
	}
	
	public function exist_user($user){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->load_dbconf();
		$connection= $core->bd_connect();
		$user = htmlspecialchars($user);
		$query = sprintf("SELECT * FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
		$result=mysql_query($query,$connection);
		$exist = mysql_num_rows($result);
		if($exist == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function exist_email($email){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->load_dbconf();
		$connection= $core->bd_connect();
		$email = htmlspecialchars($email);
		$query = sprintf("SELECT * FROM vdl_users WHERE vdl_users.email='%s'", $email);
		$result=mysql_query($query,$connection);
		$exist = mysql_num_rows($result);
		if($exist == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function add_update($_user,$_message){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->load_dbconf();
		$connection= $core->bd_connect();
		date_default_timezone_set('Europe/London');
		$date = date("Y-m-d G:i:s");
		$query = ("INSERT INTO vdl_updates (user_id,upd_msg,date) VALUES ('$_user','$_message', '$date')");
		$publicar = mysql_query($query,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
		//header("Location:../index.php");
	}

	public function add_media(){
	
	}

	public function add_note(){
	
	}

//===>Get user data
	public function get_config(){
	$config=parse_ini_file('vdl-config/config.ini',true);
	return $config;
	}

	public function get_profile($_user,$_refer){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		///===>Comprobar que es amigo
		$client = htmlspecialchars(trim($_refer));
		$user = htmlspecialchars(trim($_user));
		if (!$client){
		///===>extraer informacion limitada si no lo es
			$query = sprintf("SELECT 
									vdl_users.nickname,
									vdl_users.genre,
									vdl_users.bio,
									vdl_users.website,
									vdl_users.prof_nets
									FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
			$result=mysql_query($query,$connection);
		}
		else{
		///===>extraer informacion completa si es amigo
			$query = sprintf("SELECT 
									vdl_users.nickname,
									vdl_users.name,
									vdl_users.location,
									vdl_users.genre,
									vdl_users.bday,
									vdl_users.bio,
									vdl_users.email,
									vdl_users.website,
									vdl_users.img_prof,
									vdl_users.prof_nets
									FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
			$result=mysql_query($query,$connection);
		}
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}
				
		///===>mostrar resultado
		$a_result = array();
		while ($row = mysql_fetch_assoc($result)){
			array_push($a_result,$row);
		}
		
		//Calculamos la edad y la fecha del cumpleaños siguiente
		if ($client){
		if(substr($a_result[0]['bday'], 5, 2) > date("n")){
		$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4)-1;
		$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
		}else{
		if(date("n")==substr($a_result[0]['bday'], 5, 2) AND substr($a_result[0]['bday'], 8, 2)>date("j")){
		$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4)-1;
		$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
		}else{
		$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4);
		$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
		}
		}		
		}
		
		return $a_result;
	}

	public function get_networks($_user,$_visitor){
		include("core_network.class.php");
		$core= new CORE_SECURITY();
		$core_n= new CORE_NETWORK();
		$connection= $core->bd_connect();
		$query = ("SELECT id FROM vdl_users WHERE vdl_users.user_id='$_user'");
		$result = mysql_query($query,$connection);
		$usid = mysql_fetch_assoc($result);
		$query = ("SELECT id_net FROM vdl_user_net WHERE vdl_user_net.id_user='".$usid["id"]."'");
		$result = mysql_query($query,$connection);
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}
		$cont=array();
		while ($row = mysql_fetch_assoc($result)) {
			array_push($cont,$row);
		}
		$arresult=array();
		foreach ($cont as $row){
			$data= $core_n->get_network($row["id_net"]);
			array_push($arresult,$data);
		}
		
		return $arresult;

	}


	public function get_friends(){
	
	}

	public function get_updates($_user,$_visitor){
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = sprintf("SELECT * FROM vdl_updates WHERE user_id = '%s' ORDER BY id DESC LIMIT 0, 30", $_user);
		$result=mysql_query($query,$connection);
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}
		//mostrar resultado
		$arresult=array();
		while ($row = mysql_fetch_array($result)) {
			array_push($arresult,$row);
		}
		return $arresult;
	}

	public function get_media(){
	
	}

	public function get_note(){
	
	}

}
?>
