<?php
require_once 'GROUP_ACTORS.php';
require_once 'UFILE.php';
require_once 'EVENT.php';
require_once 'PLACE.php';


/**
 * class UPDATE
 * 
 */
class UPDATE extends GROUP_ACTORS
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/
   
  /**
   * 
   * @access private
   */
   	private $_id_msg;
  /**
   * 
   * @access private
   */
	private $_id_user;
  /**
   * 
   * @access private
   */
	private $_id_group;
  /**
   * 
   * @access public
   */
	public $_date_published;
  /**
   * 
   * @access public
   */
	public $_text;
  /**
   * 
   * @access public
   */
	public $_file;
  /**
   * 
   * @access public
   */
	public $_event;
  /**
   * 
   * @access public
   */
	public $_place;


	/*
	 * 
	 * 
	 */
	public function __construct($id_msg,$id_user,$id_group,$date_published,$text,$file=null,$event=null,$place=null){
		$_id_msg = $id_msg;
		$_id_user = $id_user;
		$_id_group = $id_group;
		$_date_published = $date_published;
		$_file = $file;
		$_event = $event;
		$_place = $place;
	}




} // end of UPDATE
?>
