<?php

/**
 * class UFILE
 * 
 */
class UFILE
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
   	private $_id;
  /**
   * 
   * @access private
   */
   	private $_id_msg;
  /**
   * 
   * @access public
   */
   	private $_name;
  /**
   * 
   * @access public
   */
   	private $_type;


	public function __construct($id,$id_msg,$name,$type){
		$_id = $id;
		$_id_msg = $id_msg;
		$_name = $name;
		$_type = $type;
	}

} // end of UFILE
?>
