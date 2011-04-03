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

	public function set_config($_title,$_descr,$_user,$_mpg,$_lang){
		$file = fopen("vdl-config/config.ini","w");
		$string="[CONFIG]\nTITLE=\"$_lang\"\nDESCR=\"$_descr\"\nUSER=$_user\nMAINPG=$_mpg\nLANG=$_lang";
		fputs($file,$string);
		fclose($file);
	}
	public function set_profile(){
	
	}

	public function add_network(){
	
	}

	public function add_friend(){
	
	}

	public function add_update($_user,$_message){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->dbconf_func();
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
									vdl_users.website
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
									vdl_users.age,
									vdl_users.bio,
									vdl_users.email,
									vdl_users.website,
									vdl_users.img_prof
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
		return $a_result;
	}

	public function get_networks(){
	
	}


	public function get_friends(){
	
	}

	public function get_update(){
	
	}

	public function get_media(){
	
	}

	public function get_note(){
	
	}

}
?>
