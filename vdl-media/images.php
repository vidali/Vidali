<div id="gallery">
    <div id="gallery_nav">
		<?php
		include("vdl-functions/bd_connect.php");
		$query = sprintf("SELECT * FROM vdl_images");
		$result=mysql_query($query,$connection);
		while ($row = mysql_fetch_assoc($result)){
			echo '<a rel="'. $row["img_title"] .'" href="javascript:;"><img src="vdl-media/vdl_storage/image/t-'. $row["img_name"] .'" /></a>';			
		}		
		?>
    </div>
 
    <div id="gallery_output">
		<?php
		$query = sprintf("SELECT * FROM vdl_images");
		$result=mysql_query($query,$connection);
		while ($row = mysql_fetch_assoc($result)){
			echo '<img id="'. $row["img_title"] .'" src="vdl-media/vdl_storage/image/'. $row["img_name"] .'" />';			
		}		
		?>
    </div>
    <div class="clear"></div>
</div>
