<?php 
/*	Vidali, Social Network Open Source.
This file is part of Vidali.

Vidali is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vidali is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.*/
?>

<!--
<script>
	
	var autocomplete = $('#remitte678').typeahead()
		.on('keyup', function(ev){
 
            ev.stopPropagation();
            ev.preventDefault();
 
            //filter out up/down, tab, enter, and escape keys
            if( $.inArray(ev.keyCode,[40,38,9,13,27]) === -1 ){
 
                var self = $(this);
                
                //set typeahead source to empty
                self.data('typeahead').source = [];
 
                //active used so we aren't triggering duplicate keyup events
                if( !self.data('active') && self.val().length > 0){
 
                    self.data('active', true);
 
                    //Do data request. Insert your own API logic here.
                    $.getJSON('< ?php echo BASEDIR;?>/vdl-include/user_autocomplete.php', {
                        q: $(this).val()
                    },  function(data) {
 
                        //set this to true when your callback executes
                        self.data('active',true);
 
                        //Filter out your own parameters. Populate them into an array, since this is what typeahead's source requires
                        var arr = [],
                            i=data.results.length;
                        while(i--){
                            arr[i] = data.results[i].text
                        }
 
                        //set your results into the typehead's source 
                        self.data('typeahead').source = arr;
 
                        //trigger keyup on the typeahead to make it search
                        self.trigger('keyup');
 
                        //All done, set to false to prepare for the next remote query.
                        self.data('active', false);
 
                    });
 
                }
            }
        })
	
</script>


<script>
	$('#remitte678').typeahead({
		source: ['jose','luis','andres','pedro']
	});
</script>

<script>
	$('#remitte678').bind ('keyup', function(){
		alert("KEY UP!!!!")
	});
</script>
-->

<?php
	$user_friends = $c_user->get_friends_commas(ID);
	$user_friends2 = $c_user->get_friends(ID);
	//print_r($user_friends);
	//echo '<BR>';
	function htmlspecialchars_deep($mixed, $quote_style = ENT_QUOTES, $charset = 'UTF-8') { 
		if (is_array($mixed)) { 
			foreach($mixed as $key => $value) { 
				$mixed[$key] = htmlspecialchars_deep($value, $quote_style, $charset); 
			} 
		} elseif (is_string($mixed)) { 
			$mixed = htmlspecialchars(htmlspecialchars($mixed, $quote_style), $quote_style, $charset); 
		} 
		return $mixed; 
	}
	$user_ff = htmlspecialchars_deep($user_friends);
	$userss = "[" . implode(",", $user_ff) . "]";
	//echo $userss . '<BR>';
	//print_r($user_ff);
?>

<!--

<script>
	function myFunctiioon()	{
		var x=document.getElementById("remitte678");
		var usuarios = <?= $user_friends2 ?>;
		for (i = 0; i < usuarios.length; i++){
			for (j = 0; j < usuarios[i].length; j++){
				
			}
		}
		x.value
	}
</script>
-->

<div align="right">
	<a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary btn-large">Nuevo mensaje</a>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Nuevo Mensaje</h3>
	</div>
	<form id="send_m" method="post" action="/Vidali/vdl-include/send_msg.php">
		<div class="modal-body">
			<h4>Para: </h4>
			<br>
			<input type="text" id="remitte678" name="remitte" class="span12" style="margin: 0 auto;" data-provide="typeahead" onkeyup="myFunctiioon()" />
			<br>
			<h4>Mensaje: </h4>
			<br>
			<textarea name="texto" class="span12" rows="10" cols="100" />
			<input type="hidden" name="conver" value="<?= $ID ?>"/>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</form>
</div>

<div class="tabbable tabs-left" >
	
		<ul class="nav nav-tabs" >
		
				<?php
					$active = 1;
					$delete = array();
					foreach ($convers as $conv){
						$messages = $c_msg->get_messages($conv[0]);
						$count_mess = 0;
						foreach ($messages as $mess){
							$hide = '';
							$users_hide = array();
							$count = 0;
							for ($i = 0; $i < strlen($mess[4]); $i++){
								if ($mess[4][$i] == ';'){
									if ($hide != ''){
										$users_hide[$count] = $hide;
										$count++;
										$hide = '';
									}
								}
								else{
									$hide += $mess[4][$i];
								}
							}
							$bool = false;
							foreach ($users_hide as $uhide){
								if ($ID == $uhide){
									$bool = true;
									break;
								}
							}
							if (!$bool)
								$count_mess++;
						}
						if ($count_mess > 0){
							if ($active == 1) {
								echo '<li class="active">';
							} else {
								echo '<li>';
							}
							echo '<form id="close_conver" method="post" action="/Vidali/vdl-include/close_conver.php"> <button type="submit" class="close">x</button> <a href="#A'.$active.'" data-toggle="tab">';
							$cont = 1;
							while ($conv[$cont] != null){
								
								if (ID != $conv[$cont]) {
									$userprueba = $c_user->get_nick($conv[$cont]);
									$img = $c_user->get_img($conv[$cont]);
									echo '<img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="60" height="60" >';
									echo $userprueba[0] . '<br>';
								}
								$cont++;
							}
							$active++;
							echo '<input type="hidden" name="conversacion" value="'.$conv[0].'"/> <input type="hidden" name="usuario" value="'.$ID.'"/></a></form></li>';
						}
						else
							array_push($delete, $conv);
					}
					foreach($delete as $del)
						unset($convers['$del']);
				?>
				
		</ul>
	
	<form id="send_m_direct" class="navbar-form" method="post" action="/Vidali/vdl-include/send_msg_direct.php">
		<div id="ab" class="tab-content" style="overflow: auto; height: 400px;">
			<?php
				$active = 1;
				foreach ($convers as $conv){
					$messages = $c_msg->get_messages($conv[0]);
					echo '<div class="tab-pane';
					if ($active == 1) {
						echo ' active';
					}
					echo '" id="A'.$active.'">';
					foreach ($messages as $mess){
						$hide = '';
						$users_hide = array();
						$count = 0;
						for ($i = 0; $i < strlen($mess[4]); $i++){
							if ($mess[4][$i] == ';'){
								if ($hide != ''){
									$users_hide[$count] = $hide;
									$count++;
									$hide = '';
								}
							}
							else{
								$hide += $mess[4][$i];
							}
						}
						$bool = false;
						foreach ($users_hide as $uhide){
							if ($ID == $uhide){
								$bool = true;
								break;
							}
						}
						if (!$bool){
							$img = $c_user->get_img($mess[1]);
							echo '<p><img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="30" height="30" >';
							$usermsg = $c_user->get_nick($mess[1]);
							echo '<font color = "blue">'.$usermsg[0].'</font><br>'.$mess[3].'<br><font color = "grey">'.$mess[2].'</font><br></p>';
						}
					}
					echo '</div>';
					$active++;
				}
			?>
			<div align="right">
				<textarea id="textdirect" name="textdirect" rows="3" style="width:82%" />
				<button type="submit" class="btn" style="height: 70px" autofocus>Enviar</button>
			</div>
		</div>
		<input type="hidden" name="usuario" value="<?= $ID ?>"/>
	</form>
</div>

