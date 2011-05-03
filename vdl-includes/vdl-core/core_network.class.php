<?php
class CORE_NETWORK{

	public function add_net($_netname,$_netdesc,$_admin){
		include("core_security.class.php");
		$core= new CORE_SECURITY();
		$connection= $core->load_dbconf();
		$connection= $core->bd_connect();
		$query = ("INSERT INTO vdl_net (net_name,net_desc,net_admin,net_img) VALUES ('$_netname','$_netdesc', '$_admin','prof_def')");
		$publicar = mysql_query($query,$connection) or die('Ups, algo falla');

		$query = ("SELECT id FROM vdl_net WHERE vdl_net.net_admin='$_admin' ORDER BY vdl_net.id DESC");
		$publicar = mysql_query($query,$connection) or die('Ups, algo falla 2');
		$netid = mysql_fetch_assoc($publicar);
		echo "netid: " . $netid["id"] . "<br>";
		echo "admin: " . $_admin;
		
		$query = ("INSERT INTO vdl_user_net (id_user,id_net) VALUES ('$_admin','".$netid["id"]."')");
		$publicar = mysql_query($query,$connection) or die('Ups, algo falla 3');

		$query = ("SELECT prof_nets FROM vdl_users WHERE vdl_users.id='$_admin'");
		$publicar = mysql_query($query,$connection) or die('Ups, algo falla 4');
		$nets = mysql_fetch_assoc($publicar);
		$nets["prof_nets"]++;
		$query = ("UPDATE  vidali.vdl_users SET  prof_nets = ". $nets["prof_nets"]." WHERE  vdl_users.id =$_admin");
		$publicar = mysql_query($query,$connection) or die('Ups, algo falla 5');

		header("Location:../index.php?alert=adntrue");
	}
	
	public function get_network($_idnet){
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = ("SELECT id,net_name,net_desc,net_img FROM vdl_net WHERE vdl_net.id='$_idnet'");
		$result = mysql_query($query,$connection);
		return mysql_fetch_assoc($result);
	}
	
	public function list_nets(){
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = ("SELECT id,net_name,net_desc,net_img FROM vdl_net");
		$result = mysql_query($query,$connection);
		$results = array();
		while ($row=mysql_fetch_assoc($result)){
			array_push($results,$row);
		}
		return $results;
	}
	
	public function get_network_page($_name){
		$core= new CORE_SECURITY();
		$core_n= new CORE_NETWORK();
		$connection= $core->bd_connect();
		//si leo esto es porque me puse a jugar y me olvide de acabar la funcion.
		$query = ("SELECT id,net_name,net_desc,net_img FROM vdl_net WHERE vdl_net.net_name='$_name'");
		$result = mysql_query($query,$connection);
		return mysql_fetch_assoc($result);
	}
}
