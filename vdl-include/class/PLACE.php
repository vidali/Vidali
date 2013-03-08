<?php

/**
 * class PLACE
 * 
 */
class PLACE
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
   	public $_name_place;
  /**
   * 
   * @access private
   */
   	public $_location_coord;

	public function __construct($id,$id_msg,$name_place,$location_coord){
		$_id = $id;
		$_id_msg = $id_msg;
		$_name_place = $name_place;
		$_location_coord = $location_coord;
	}

} // end of PLACE
?>
