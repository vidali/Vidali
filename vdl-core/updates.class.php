<?php
class Update{
//variables privadas
	private $_user;
	
	private function getuser(){
		return $this->_user;
	}

//Elemento Privado: Obtener una actualizacion...
	public function get_update($_upd_id){
		//conectar a base de datos
		$core= new CORE_SECURITY();
		$connection= $core->bd_connect();
		$query = sprintf("SELECT * FROM vdl_updates WHERE vdl_updates.id='%s'", $_upd_id);
		$result=mysql_query($query,$connection);
		if (!$result) {
			 $message  = 'Invalid query: ' . mysql_error() . "\n";
			 $message .= 'Whole query: ' . $query;
			 die($message);
		}
		//mostrar resultado
		$arresult = mysql_fetch_assoc($result);
		return $arresult;
	}

//Elementos Publicos: Constructor la clase...
	public function __construct ($_ref){ 
		$this->_user = htmlspecialchars(trim($_ref));
	}
	
	public function get_updates($_range,$_refer){
		$a_result=array();
		if ($_range > $_refer){
			for($i = $_refer;$i > 0;$i--){
				$upd=$this->get_update($i);
				array_push($a_result,$upd);		
			}
		}
		else{
			$last= $_refer - $_range;
			for($i = $_refer; $i > $last;$i--){
				$upd=$this->get_update($i);
				array_push($a_result,$upd);
			}
		}
		return $a_result;
	}
}

?>
