<?php
//function vdl_getscripts(){

//}

//function open_session(){

//}

function load_mainscripts(){

}

function load_site_config(){
	include("vdl-core/core_security.class.php");
	$core= new CORE_SECURITY();
	$core->load_dbconf();
	$connection = $core->bd_connect();	
	$core->load_settings($connection);	
}

function load_lang($_lang){
	include ("vdl-lang/lang_$_lang.conf.php");
}

function get_user_browser(){
   $u_agent = $_SERVER['HTTP_USER_AGENT'];
   $ub = '';
   if(preg_match('/MSIE/i',$u_agent)){
       $ub = "ie";
   }
   elseif(preg_match('/Firefox/i',$u_agent)){
       $ub = "firefox";
   }
   elseif(preg_match('/Chrome/i',$u_agent)){
       $ub = "chrome";
   }
   elseif(preg_match('/Safari/i',$u_agent)){
       $ub = "safari";
   }
   elseif(preg_match('/Opera/i',$u_agent)){
       $ub = "opera";
   } 
   return $ub;
}

function gbversion(){
	$Name="";
	$Version=""; 
	$browsers = array("firefox", "msie", "opera", "chrome", "safari",
					  "mozilla");
        $Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        foreach($browsers as $browser)
        {
            if (preg_match("#($browser)[/ ]?([0-9.]*)#", $Agent, $match))
            {
                $Name = $match[1] ;
                $Version = $match[2] ;
                break ;
            }
        }  
  return $Version;
} 

function get_interface(){
	if((get_user_browser()=="ie" && gbversion() >= "9.0") || (get_user_browser()=="firefox" && gbversion() >= "4.0") ||
	  (get_user_browser()=="opera" && gbversion() >= "9.80") || (get_user_browser()=="chrome" && gbversion() >= "5.0") ||
	  (get_user_browser()=="safari" && gbversion() >= "5.0")){
		return "html5";
	}
	else{
		return "html4";
	}
}

?>
