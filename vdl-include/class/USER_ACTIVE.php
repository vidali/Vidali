<?php
require_once 'USER.php';


/**
 * class USER_ACTIVE
 * 
 */
class USER_ACTIVE extends USER
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   *
   * @param string __USER 

   * @return void
   * @access public
   */
	public function __construct ($_USER){
		parent::__construct($_USER);

	} // end of member function __construct

	public function get_basic_data(){
		$result = [ "n_friends" => $this->_prof_friends,
					"n_groups" => $this->_prof_groups,
					"n_views" => $this->_prof_visits,
				  ];
		return $result;
	}
} // end of USER_ACTIVE
?>
