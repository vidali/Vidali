<?php


	chdir('../../');
	include('leaf/run.php');


	function reducir_color( $matches ){
		
		$matches[0] = strtolower( $matches[0] );
		if( (isset( $matches[0][2] ) && ($matches[0][1] == $matches[0][2])) && (isset( $matches[0][4] ) && ($matches[0][3] == $matches[0][4])) && (isset( $matches[0][6] ) && ($matches[0][5] == $matches[0][6])) )
			return '#'.$matches[0][1].$matches[0][3].$matches[0][5];
		else
			return $matches[0];
		
	}

	$imagenes_localizadas = array();
	function localizar_imagenes( $matches ){
		
		$archivo = $matches[1].'.'.$matches[2];
		if( is_file( $archivo ))
			return 'url('.$archivo.');';
		else{
			
			global $imagenes_localizadas;
			if( empty( $imagenes_localizadas ))
				lw('finder')->regfinder( $imagenes_localizadas , '/\.(jpg|bmp|png|jpeg|gif|JPG|BMP|PNG|JPEG|GIF)$/' , 'template/' , RECURSIVE );

			return 'url(../../'.lw('finder')->getPath( basename( $archivo ) , $imagenes_localizadas , 1 ).');';
			
		}
			
	
	}

	function compress( $buffer ){
		
		$buffer = preg_replace( '/(\r\n|\r|\n|\t|\s{2,})+/' , '' , $buffer );
		
		if( lw::gi('config')->get('css','autolocate') == true ){
			
			$buffer_aux = '';

			preg_match_all( '/\/\*INI_LW\*\/\s\/\*CSS (.*?.css)\\*\/\s?(.*?)\/\*FIN_LW\*\//' , $buffer , $coincidencias );

			for( $i = 0 ; $i < count( $coincidencias[1] ) ; $i++ )
				$buffer_aux .= preg_replace_callback( '/url\s?\(\'?\"?(.*?)\.(jpg|bmp|png|jpeg|gif|JPG|BMP|PNG|JPEG|GIF)\'?\"?\)/' , "localizar_imagenes" , $coincidencias[2][$i] );
			
			
		}
		
		if( is_array( $coincidencias ) ){
		
			$buffer_aux = preg_replace_callback( '/\#([a-hA-H0-9]+)/' , "reducir_color" , $buffer_aux );
			$buffer = $buffer_aux;
		
		}else{
		
			$buffer = preg_replace_callback( '/\#([a-hA-H0-9]+)/' , "reducir_color" , $buffer );
		
		}
		
		
		$buffer = preg_replace( '/\/\*(.*?)\*\//' , '' , $buffer );
		$buffer = preg_replace('/;\s{0,}\}/','}',$buffer);
		$buffer = preg_replace('/\s{1,}\{/','{',$buffer);
		$buffer = preg_replace('/\);\s{1,}/',');',$buffer);
		$buffer = preg_replace('/\:(\s{0,})?/',':',$buffer);
		$buffer = preg_replace('/\{(\s{0,1})?/','{',$buffer);
		$buffer = preg_replace('/\;(\s{0,1})?/',';',$buffer);
		$buffer = preg_replace('/url\(\'(.*?)\'\)\s?([a-zA-Z-]+)\s?/' , "url($1)$2" , $buffer );
		$buffer = preg_replace('/\,\s{0,1}\./',',.',$buffer);
		$buffer = preg_replace('/font-weight:(\s{0,})?bold/','font-weight:700',$buffer);
		$buffer = preg_replace('/font-weight:(\s{0,})?normal/','font-weight:400',$buffer);
		$buffer = preg_replace('/\:0px/', ':0' , $buffer );
		$buffer = preg_replace('/(px 0px)/', 'px 0' , $buffer );
		$buffer = preg_replace('/rgba\((\s?)+([0-9]+)(\s?)+\,(\s?)+([0-9]+)(\s?)+\,(\s?)+([0-9]+)(\s?)+\,(\s?)+([0-9]+)\.([0-9])+(\s?)+\)/',"rgba($2,$5,$8,$11.$12)",$buffer);
		$buffer = preg_replace('/\?/','',utf8_decode($buffer));
		
		return $buffer;

	}

	$revalidar = 60*60;
	$expire = 'expires: '.gmdate( 'D, d M Y H:i:s' , time()+$revalidar ) . ' GMT';	
	
	header('Content-type: text/css');
	//header('cache-control: must-revalidate');
	//header( $expire );
	
	ob_start('compress');
	
	
	
	$dir = lw::gi('config')->get('css','dir');
	$files = array_unique( lw('finder')->regfinder( $buscar , '/\.css$/' , $dir , RECURSIVE ));	
	
	$lista = lw('config')->get('css','list');
	if( lw('config')->get('css','autolocate') == true ) $lista[] .= '.dont_remove';
	
	for( $x = 0 ; $x < count( $lista ) ; $x++ ){
	
		$archivo_css = $lista[$x];
		$path = preg_replace( '/\/\//' , '/' , lw('finder')->getPath( $archivo_css.'.css' , $buscar , 1 ));
		
		if( $path != 'null' ){
			
			echo '/*INI_LW*/ /*CSS '.$path.'*/';
			include( $path );
			echo '/*FIN_LW*/';
		}
	}
	
	ob_end_flush();
	
?>
