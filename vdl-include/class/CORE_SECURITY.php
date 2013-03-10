<?php
/**
 * class CORE_SECURITY
 * 
 */
class CORE_SECURITY{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $_session_key;


  /**
   * 
   *
   * @return void
   * @access public
   */
  public function __construct( ) {
  } // end of member function __construct

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function __destruct( ) {
  } // end of member function __destruct

  /**
   * 
   *
   * @param mixed __string 

   * @return void
   * @access public
   */
  public function encrypt( $__string ) {
  } // end of member function encrypt

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function get_key( ) {
  } // end of member function get_key

  /**
   * 
   *
   * @param mixed _source 

   * @return void
   * @access public
   */
  public function clear_text_strict( $_source ) {
  } // end of member function clear_text_strict

  /**
   * 
   *
   * @param mixed _source 

   * @return void
   * @access public
   */
  public function clear_text( $_source ) {
    $url_words=array("MIME-Version:","Content-Transfer-Encoding:","Return-path:","Subject:","From:",
                 "Envelope-to:","To:","bcc:","cc:");
    $script_words=array("onload(","alert(",");","&lt;script&gt;","&lt;/script&gt;","&quot;","&#39;");
    $banned_sites=array("www.4chan.org");
    $aux=htmlentities($_source,ENT_QUOTES);
    $aux=str_ireplace($url_words,"",$aux);
    $aux=str_ireplace($script_words,"",$aux);
    return $aux;
  } // end of member function clear_text

  /**
   * 
   *
   * @param mixed _source 

   * @return void
   * @access public
   */
  public function email_val( $_source ) {
  } // end of member function email_val

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function clear_url_nav( ) {
  } // end of member function clear_url_nav





} // end of CORE_SECURITY
?>
