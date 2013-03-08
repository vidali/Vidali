<?php

/**
 * class EVENT
 * 
 */
class EVENT
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
   	public $_event_tittle;

	public function __construct($id,$id_msg,$event_tittle){
		$_id = $id;
		$_id_msg = $id_msg;
		$_event_tittle = $event_tittle;
	}


} // end of EVENT
?>
