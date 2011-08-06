<?php
class Notes{
///===>Private vars
	public $_id;
	public $_titulo;
	public $_resume;
	public $_post;
	public $_autor;
	public $_fecha;
	public $_grupo;
	private $_user;

///===>Public vars
function __construct()
{
	$this->_id = 0;
	$this->_titulo = "";
	$this->_post = "";
	$this->_autor = "";
	$this->_fecha = "";
	$this->_grupo = "";
}

public function set_note ($intitulo=null, $inResume=null, $inPost=null, $inAutor=null, $infecha=null,$incats,$innewcats,$inadd){
	if (!empty($intitulo))
	{
		$this->_titulo = $intitulo;
	}
	if (!empty($inResume))
	{
		$this->_resume = $inResume;
	}
	if (!empty($inPost))
	{
		$this->_post = $inPost;
	}

	if (!empty($inAutor))
	{
		$this->_autor = $inAutor;
	}

	if (!empty($infecha))
	{
		$this->_fecha = $infecha;
	}
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
	$titulo = $this->_titulo;
	$resume = $this->_resume;
	$post = $this->_post;
	$autor = $this->_autor;
	$fecha = $this->_fecha;
	$add_cat = explode(",",$innewcats);
	$add_new = $inadd;
	$query = ("INSERT INTO vdl_notes (title,resume,content,author,date) VALUES ('$titulo','$resume','$post','$autor','$fecha')");
	$publicar = mysql_query($query,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));

	//=========> Obteniendo ID del post...
	$query = mysql_query("SELECT id FROM vdl_notes ORDER By id DESC");
	$row = mysql_fetch_assoc($query);
	$id = $row["id"];

	foreach ($incats as $cat_id)
	{
		$var = ("INSERT INTO vdl_notes_groups_rel (id_note,id_group) VALUES ('$id', '$cat_id')");
		$publicar = mysql_query($var,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
	}
	if ($add_new == 'on')
	{
	foreach ($add_cat as $cat)
		{
			echo $cat;
			$cat = ucfirst(trim($cat));
			$var = ("INSERT INTO vdl_groups(group_name,group_note_enabled) VALUES ('$cat','1')");
			$publicar = mysql_query($var,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
			$query = mysql_query("SELECT id FROM vdl_groups ORDER By id DESC");
			$row = mysql_fetch_assoc($query);
			$cat_id = $row["id"];
			$var = ("INSERT INTO vdl_notes_groups_rel (id_note,id_group) VALUES ('$id', '$cat_id')");
			$publicar = mysql_query($var,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));		
		}
	}
	header("Location:../index.php?pg=notes&added=true");
}

public function get_note($_note_id){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
	$result = array();
	$query = sprintf("SELECT * FROM vdl_notes WHERE vdl_notes.id='%s'", $_note_id);
	$data=mysql_query($query,$connection);
	if (!$data) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
		 $message .= 'Whole query: ' . $query;
		 die($message);
	}
	$result = mysql_fetch_assoc($data);

	$groups = "Sin agrupar";
	$query = sprintf("SELECT vdl_groups.* FROM vdl_notes_groups_rel LEFT JOIN (vdl_groups) ON (vdl_notes_groups_rel.id_group = vdl_groups.id) WHERE 
							vdl_notes_groups_rel.id_note ='%s'",$_note_id);
	$data=mysql_query($query,$connection);
	$aux = array();
	while($row = mysql_fetch_assoc($data))
	{
		array_push($aux, $row["group_name"]);
	}
	foreach ($aux as $cat){
				if ($groups == "Sin agrupar")
				{
					$groups = $cat;
				}
				else
				{
					$groups = $groups . ", " . $cat;
				}
	}
	$result["groups"] = $groups;
	//mostrar resultado
	return $result;
}


public function get_sections ($inId=null)
{
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM vdl_groups WHERE id = " . $inId); 
	}
	else
	{
		$query = mysql_query("SELECT * FROM vdl_groups ORDER BY `vdl_groups`.`group_name`");
	}
	
	$categArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		array_push($categArray, $row);
	}
	return $categArray;
}


	public function get_notes($_range,$_refer){
		$a_result=array();
		if ($_range > $_refer){
			for($i = $_refer;$i > 0;$i--){
				$note=$this->get_note($i);
				array_push($a_result,$note);		
			}
		}
		else{
			$last= $_refer - $_range;
			for($i = $_refer; $i > $last;$i--){
				$note=$this->get_note($i);
				array_push($a_result,$note);		
			}
		}
		return $a_result;
	}
	
		public function get_comment($_note_id){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = sprintf("SELECT vdl_notes_com.* FROM vdl_notes_com_rel LEFT JOIN vdl_notes_com ON ( vdl_notes_com_rel.id_note='%s') WHERE vdl_notes_com_rel.id_com = vdl_notes_com.id", $_note_id);
		$result=mysql_query($query,$connection);
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}
		//mostrar resultado
		$a_result = array();
		while ($row = mysql_fetch_assoc($result)){
			array_push($a_result, $row);
		}
		return $a_result;
	}

	public function set_comment($inuser=null, $inemail=null, $inadress=null, $incomment=null,$innote=null){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = ("INSERT INTO vdl_notes_com (user,email,adress,comment) VALUES ('$inuser','$inemail','$inadress','$incomment')");
		$publicar = mysql_query($query,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
		//=========> Obteniendo ID del comentario...
		$query = mysql_query("SELECT id FROM vdl_notes_com ORDER By id DESC");
		$row = mysql_fetch_assoc($query);
		$id = $row["id"];
		//=========> Relacionando comentario con post...
		$var = ("INSERT INTO vdl_notes_com_rel (id_com,id_note) VALUES ('$id', '$innote')");
		$publicar = mysql_query($var,$connection) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));
	}
}
?>
