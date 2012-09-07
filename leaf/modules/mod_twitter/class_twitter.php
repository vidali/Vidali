<?php 
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_twitter.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo class_twitter.php se encarga de publicar en tu twitter un
 * estatus que le pongas en el form resultante del archivo ( de ejemplo )
 * twitter.tpl
 **********************************************************************/
       
         needs( 'post' );
         needs( 'get' );
         class twitter {
         
            private $nombre_de_usuario;
            private $mi_contrasena; // recuerda que no es una buena práctica usar carácteres como la ñ para definir variables
         
            public function __construct(){
            
               $this->nombre_de_usuario = lw('config')->get('twitter','username');
               $this->mi_contrasena = lw('config')->get('twitter','password');
               
            }
            
            public function publicar(){
            
               // Comprobamos que no exista contenido post que enviar
               if( !lw('post')->exists() )
                  
                  return lw('html')->get( 'twitter' );
                  
               else{
               
                  /* AVISO: el siguiente código no es mío, ha sido extraido directamente desde
                  http://www.barattalo.it/2010/09/09/how-to-change-twitter-status-with-php-and-curl-without-oauth/
                  con los cambios oportunos para el correcto funcionamiento del ejemplo
                  */
               
                  //----------------------------------------------------
                  
                  if (!function_exists('curl_init'))
                     exit('Se necesita CURL para publicar');
                  
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/session/new");
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                  curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
                  curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");
                  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A543a Safari/419.3 ");
                  $page = curl_exec($ch);
                  $page = stristr($page, "<div class='signup-body'>");
                  preg_match("/form action=\"(.*?)\"/", $page, $action);
                  preg_match("/input name=\"authenticity_token\" type=\"hidden\" value=\"(.*?)\"/", $page, $authenticity_token);
                  $strpost = "authenticity_token=".urlencode($authenticity_token[1])."&username=".urlencode($this->nombre_de_usuario)."&password=".urlencode($this->mi_contrasena);
                  curl_setopt($ch, CURLOPT_URL, $action[1]);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $strpost);
                  $page = curl_exec($ch);
                  preg_match("/\<div class=\"warning\"\>(.*?)\<\/div\>/", $page, $warning);
                  if (isset($warning[1])) return $warning[1];
                  $page = stristr($page,"<div class='tweetbox'>");
                  preg_match("/form action=\"(.*?)\"/", $page, $action);
                  preg_match("/input name=\"authenticity_token\" type=\"hidden\" value=\"(.*?)\"/", $page, $authenticity_token);
                  $strpost = "authenticity_token=".urlencode($authenticity_token[1]);
                  $tweet['display_coordinates']= '';
                  $tweet['in_reply_to_status_id']= '';
                  $tweet['lat']= '';
                  $tweet['long']= '';
                  $tweet['place_id']= '';
                  $tweet['text'] = substr( lw('post')->get('tweet') , 0 , 140 );
                  $ar = array("authenticity_token" => $authenticity_token[1], "tweet"=>$tweet);
                  $data = http_build_query($ar);
                  curl_setopt($ch, CURLOPT_URL, $action[1]);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                  $page = curl_exec($ch);                 
               
                  if( preg_match( '/(Sign in information is not correct)/' , $page ))
                  	return 'Error en el login';
                  else
                     return 'Tweet publicado :-)';

               
               }
            
            }
         
         
         }
         
      ?>
