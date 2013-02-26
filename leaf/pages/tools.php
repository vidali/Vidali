<?php

function ascii2hex($ascii) {
$hexadecimal = '';
for ($i = 0; $i < strlen($ascii); $i++) {
$byte = strtoupper(dechex(ord($ascii{$i})));
$byte = str_repeat('0', 2 - strlen($byte)).$byte;
$hexadecimal.=$byte." ";
}
return $hexadecimal;
}

function hex2ascii($hexadecimal){
$ascii='';
$hexadecimal=str_replace(" ", "", $hexadecimal);
for($i=0; $i<strlen($hexadecimal); $i=$i+2) {
$ascii.=chr(hexdec(substr($hexadecimal, $i, 2)));
}
return($ascii);
}

function text_to_char( $texto , $separador = ' ' ){

   $concat = '';
   
   for( $i = 0 ; $i < strlen( $texto ) ; $i++ )
      $concat .= ord( $texto[$i] ).$separador;
   
   return substr( $concat , 0 , strlen( $concat )-1 );


}


   needs('post');
   if( lw('post')->exists() ){
      
      $md5 = md5( lw('post')->get('textoplano') );
      $sha1 = sha1( lw('post')->get('textoplano') );
      
      if( lw('post')->get('separator') == 'on' )
         $tchar = text_to_char( lw('post')->get('textoplano') );
      else
         $tchar = text_to_char( lw('post')->get('textoplano') , lw('post')->get('separador') );
      
   }else
      echo 'y';


?>



<table border="0" cellpadding="1" cellspacing="1" style="width: 600px; ">
	<tbody>
		<tr>
			<td>
				<form method="post" action="" name="plain_text">
					Texto Plano<br />
					<textarea cols="30" name="textoplano" rows="10"></textarea>
               <input name="submit" type="submit" value="Enviar" />&nbsp;
               <input name="separator" type="checkbox" value="0" />Separar por&nbsp;<input maxlength="1" name="separador" size="1" type="text" value="," />
            </form>
			</td>
			<td>
				Base64<textarea cols="30" name="base64" rows="10"></textarea></td>
			<td>
				Md5<textarea cols="30" name="md5" rows="10"><?= @$md5; ?></textarea></td>
		</tr>
		<tr>
			<td>
				Char<br />
				<textarea cols="30" name="char" rows="10"><?= @$tchar; ?></textarea></td>
			<td>
				Sha1<textarea cols="30" name="sha1" rows="10"><?= @$sha1; ?></textarea></td>
			<td>
				Hex<br />
				<textarea cols="30" name="hex" rows="10"></textarea></td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
