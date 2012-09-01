<?php

if( lw('session')->get('admin') == 'on' )
   echo lw('tpl')->parse( 'menu:menuon' );
else
   echo lw('tpl')->parse( 'menu:menuoff' );

?>
