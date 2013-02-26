<?php


if( lw('post')->get('key') == lw('config')->get('adminpass') ){
   lw('session')->set( 'admin' , 'on' );
   header('location: '.lw('server')->get('REQUEST_URI') );
}

if( lw('session')->get('admin') == 'on' )
   
   switch( lw('get')->param(1) ){
   
      //case 'log' : echo lw('debug')->getlog(); break;
      case 'log' : $z = lw('debug')->zebra( lw('debug')->getlog() , 5 ); echo lw('tpl')->parse( 'admin:table' , array( 'tabla' => $z )); break;
      
      //case 'log' : $contenido = lw('debug')->zebra( lw('debug')->getlog() , 5 ); ec$contenido</TABLE>"; break;
      
      //case ''
      default : echo lw('tpl')->parse( 'admin:bienvenido' ); break;
   
   }
   
else
   echo lw('tpl')->parse( 'admin:login' );

?>
